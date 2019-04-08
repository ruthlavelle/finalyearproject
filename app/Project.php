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
        'PM_id',
        'user_id',
        'IT_team_id',
        'priority_id',
        'closure_date',
        'approval_status'
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
        return $this->belongsTo('App\RAG');
    }

    public function Status(){
        return $this->belongsTo('App\Status');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function project_manager(){
        return $this->belongsTo('App\ProjectManager', 'PM_id');
    }

}
