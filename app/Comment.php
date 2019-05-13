<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [

        'project_id',
        'is_active',
        'author',
        'body'

    ];

    //Creates relationship to Comment_Replies table
    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

    //Creates relationship to projects table
    public function project(){
        return $this->belongsTo('App\Project');
    }
}
