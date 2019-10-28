<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_answers extends Model
{
    protected $fillable = ['user_answer', 'u_id', 'q_id'];

    public $timestamps = false;
}
