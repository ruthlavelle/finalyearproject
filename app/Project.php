<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'benefits',
        'cost',
        'ROI',
        'spend',
        'due_date',
        'driver_id',
        'department_id',
        'RAG_id',
        'status_id',
        'project_manager',
        'update',
        'user_id',
        'IT_team_id',
        'priority_id',
        'closure_date',
        'approval_status'
    ];

    protected $dates = [
        'due_date',
        'closure_date'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }

    public function department(){

        return $this->belongsTo('App\Department');
    }

    public function driver(){

        return $this->belongsTo('App\Driver');
    }

    public function RAG(){
        return $this->belongsTo('App\RAG', 'RAG_id');
    }

    public function Status(){
        return $this->belongsTo('App\Status');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }


}
