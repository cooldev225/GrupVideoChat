<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\RoleUser;
use App\Datas\UserRole;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\RoleUser','user_id');
    }

    public function fullName()
    {
        return ucfirst($this->firstname).' '.ucfirst($this->lastname);
    }

    public function isAdmin()
    {
         return $this->getUserRole()->admin;
    }

    public function getUserRole()
    {
        $userId = $this->id;
        $userRole = new UserRole;
        $_userRoles = RoleUser::with('role')
                ->where('user_id', $userId)->get();
        foreach ($_userRoles as $_role) {
            switch ($_role->role->name)
            {
                case 'admin':
                    $userRole->admin = true;
                    break;
                case 'PA':
                    $userRole->personalAssistant = true;
                    break;
                case 'Broker':
                    $userRole->broker = true;
                    break;
                case 'Head Broker':
                    $userRole->headBroker = true;
                    break;
                case 'Org Manager':
                    $userRole->organisationManager = true;
                    break;
                case 'Org Admin':
                    $userRole->organisationAdmin = true;
                    break;
                default :
                    break;
            }
        }
        return $userRole;
    }

    public function setUserRoles($roles){
        $userId = $this->id;
        RoleUser::select()->where('user_id','=',$userId)->delete();
        foreach($roles as $role){
            $roleuser=new RoleUser;
            $roleuser->user_id=$userId;
            $roleuser->role_id=$role;
            $roleuser->created_at=date("Y-m-d H:i:s");
            $roleuser->updated_at=$roleuser->created_at;
            $roleuser->save();
        }
    }
}
