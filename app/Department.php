<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}


