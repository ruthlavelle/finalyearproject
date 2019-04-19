<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RAG extends Model
{
    protected $table = 'RAGs';

    protected $fillable = [

        'name'
    ];

    public function projects(){
        return $this->hasMany('App\Project');
    }
}
