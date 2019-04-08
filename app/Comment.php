<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [

        'project_id',
        'is_active',
        'author',
        'email',
        'body'

    ];

    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
