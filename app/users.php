<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'phone', 'password', 'last_login', 'total_points'];

    public function answers(){
    	return $this->hasMany('App\user_answers', 'u_id');
    }
}
