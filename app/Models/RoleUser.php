<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $fillable = [
        'user_id', 'role_id'
    ];

    protected $hidden = [
        'user_id', 'created_at', 'updated_at', 'role_id'
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    protected $table = 'roles_users';
}
