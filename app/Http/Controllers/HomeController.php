<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Util\DbUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Room;
use App\Models\RoomCharge;
use Illuminate\Support\Facades\Auth;

use Twilio\Rest\Client;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class HomeController extends Controller
{
    protected $sid;
    protected $token;
    protected $key;
    protected $secret;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->sid = config('services.twilio.sid');
        $this->token = config('services.twilio.token');
        $this->key = config('services.twilio.key');
        $this->secret = config('services.twilio.secret');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $rooms = [];
        try {
            $client = new Client($this->sid, $this->token);
            $allRooms = $client->video->rooms->read([]);

            $rooms = array_map(function($room) {
                return $room->uniqueName;
            }, $allRooms);

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return view('frontend.home',[
            '_rooms'=>$rooms,
            'avatar'=>Auth::user()->avatar,
            'full_name'=>Auth::user()->firstName." ".Auth::user()->lastName,
            'email'=>Auth::user()->email,
        ]);
    }
    public function getRoomsView(){
        $rooms=Room::select()->orderBy('created_at','desc')->get();
        foreach($rooms as $room){
            $room_charges[$room['id']]=RoomCharge::select('users.*')
                    ->leftJoin('users','users.id','=','room_charges.user_id')
                    ->where('room_charges.room_id',$room['id'])
                    ->orderBy('room_charges.created_at','desc')->get();
        }        
        return view('frontend.rooms_view',[
            'rooms' => $rooms,
            'room_charges' => $room_charges,
        ]);
    }
    public function room(Request $request)
    {
        $room_id=$request->route('room_id');
        $room=Room::find($room_id);
        $client = new Client($this->sid, $this->token);
        $exists = $client->video->rooms->read([ 'uniqueName' => $room->name]);
        if(empty($exists)){
            $client->video->rooms->create([
                'uniqueName' => $room->name,
                'type' => 'group',
                'recordParticipantsOnConnect' => false
            ]);
            \Log::debug("created new room: ".$room->name);
            $room->owner=Auth::id();
            $room->stream=(Auth::id()).date('_Y_m_d_H_i_s');//$token->toJWT();
            $room->save();
        }
        // A unique identifier for this user
        $identity = Auth::user()->firstName;
        \Log::debug("joined with identity: $identity");
        $token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);
        $videoGrant = new VideoGrant();
        $videoGrant->setRoom($room->name);
        $token->addGrant($videoGrant);
        
        //return view('frontend.room', [ 'accessToken' => $token->toJWT(), 'roomName' => $room->name , 'room_id'=>$room_id]);
        return view('frontend.room', [ 'accessToken' => $token->toJWT(), 'roomName' => $room->name , 'room_id'=>$room_id, 'sid'=>$this->sid, 'token'=>$this->token, 'key'=>$this->key, 'secret'=>$this->secret]);
    }

    public function addCharge(Request $request){
        $room_id=$request->input('room_id');
        $charge=RoomCharge::select()->where('room_id',$room_id)->where('user_id',Auth::id());
        if($charge->count())$charge=$charge->get()[0];                
        else{
            $charge=new RoomCharge;
            $charge->room_id=$room_id;
            $charge->user_id=Auth::id();
            $charge->created_at=date('Y-m-d H:i:s');
        }
        $charge->updated_at=date('Y-m-d H:i:s');
        $charge->save();
    }
    public function delCharge(Request $request){
        $room_id=$request->input('room_id');
        $charge=RoomCharge::select()->where('room_id',$room_id)->where('user_id',Auth::id())->delete();
    }

    public function addRoom(Request $request){
        $room_size=$request->input('room_size');
        $room_name=$request->input('room_name');
        $room=Room::select()->where('name',$room_name);
        if($room->count())return 'Error! there is exist the topic.';
        $room=new Room;
        $room->name=$room_name;
        $room->size=$room_size;
        $room->stream='';
        $room->state=0;
        $room->owner=Auth::id();
        $room->created_at=date('Y-m-d H:i:s');
        $room->updated_at=date('Y-m-d H:i:s');
        $room->save();
        return 'success';
    }
}
