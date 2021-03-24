<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Helper\MailHelper;

use App\Models\Session;
use App\Models\User;

use App\Datas\MailData;
use App\Models\LastLogin;
class AuthController extends Controller
{
    public function __invoke(Request $request)
    {
        if (Auth::check()) return redirect()->intended('home');
        else return view('frontend.auth.login', ['page_title' => 'Login']);//MsurJKOO
    }

    protected function selectAuthType(Request $request)
    {
        $login = $request->input('username');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $request->merge([$fieldType => $login]);
        switch ($fieldType)
        {
            case 'email':
                return true;
                break;
            case 'username':
                return false;
                break;
        }
    }

    public function login(Request $request)
    {
        $validator = $this->selectAuthType($request) ?
            $request->validate([
                'email'     => 'required',
                'password'  => 'required'
            ])
            :
            $request->validate([
                'username'     => 'required',
                'password'  => 'required'
            ])
        ;

        if (Auth::attempt($validator))
        {
            if(auth::check()){
                $login = Session::select()->where('user_id', Auth::id())->get();
                if (count($login) > 0)
                {
                    if($this->get_client_ip()==$login[0]['ip_address']){
                        $login[0]->delete();
                    }else{
                        Session::select()->where('user_id',Auth::id())->delete();//Auth::logoutUsingId(Auth::id());
                        Auth::logout();                        
                        //$user = Auth::user();
                        //$user->logout = 1;
                        //$user->save();
                        session()->flash('logout', "You are Logged in on other devices");
                        return view('frontend.auth.login', ['page_title' => 'Login','error'=>"double_attempt"]);
                    }
                }
                $session=new Session;
                $session->id=session()->getId();
                $session->user_id=Auth::id();
                $session->ip_address=$this->get_client_ip();
                $session->user_agent='';
                $session->payload='login';
                $session->last_activity=1;
                //$session->save();
            }
            $request->session()->regenerate();
            $row=new LastLogin;
            $row->userId=Auth::id();
            $row->time=date("Y-m-d H:i:s");
            $row->save();
            return redirect()->intended('home');
        }
        else
        {
            return view('frontend.auth.login', ['page_title' => 'Login']);
        }
    }

    public function logout(Request $request)
    {
        Session::select()->where('user_id',Auth::id())->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function forgot(Request $request)
    {
        $email = $request->input('email');
        if($email==null)return view('frontend.auth.login',['page_title' => 'Forgot']);
        $_user = User::where('email', $email)
            ->select('id as userId', 'email as userEmail', 'username as userName', 'firstName as firstName', 'lastName as lastName')
            ->get();
        if($_user && count($_user) === 1)
        {
            $user = $_user[0];
            $login = Session::select()->where('user_id', $user->userId)->get();
            if(count($login))$login[0]->delete();
            $newPassword = Str::random(8);
            $_newPassword = Hash::make($newPassword);

            User::where('id', $user->userId)->update(['password'=>$_newPassword]);

            $mailData = new MailData();
            $mailData->template='temps.password_changed';
            $mailData->fromEmail = config('mail.from.address');
            $mailData->userName = $user->userName;
            $mailData->toEmail = $email;
            $mailData->subject = 'Witbooster - Password Reset';
            $mailData->mailType = 'RESET_LINK_TYPE';
            $mailData->content = $newPassword;

            Mail::to($mailData->toEmail)->send(new MailHelper($mailData));

            return redirect()->intended('login');
        }
        else{
            return view('frontend.auth.login', ['page_title' => 'Login']);
        }
    }

    public function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else

        if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];

        else
            $ipaddress = 'UNKNOWN';

        return $ipaddress;
    }

    public function signInUpByGoogle(Request $request)
    {
        $request->merge([
            'password' => $request->input('email')."tempP@ss123",
        ]);
        $user=User::where('email',$request->input('email'));
        if($user->count()){
            $user=$user->get()[0];
            $user->avatar=$request->input('avatar');
            $user->save();            
        }else{
            $user=User::create([
                'first_name' => $request->input('first_name'),
                'last_name' => '',
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'avatar' => $request->input('avatar'),
                'password' => Hash::make($request->input('password')),
            ]);
        }
        return $this->login($request);
    }
}
