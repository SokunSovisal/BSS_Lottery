<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public function role()
    {
    	return $this->belongsTo('App\Models\UserRoles','user_role_id');
    }
}
