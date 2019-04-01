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
        'strategic_driver_id',
        'department_id',
        'RAG_id',
        'status_id',
        'PM_id',
        'user_id',
        'IT_team_id',
        'priority_id',
        'closure_date'
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
