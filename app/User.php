<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function project(){
       return $this->hasMany('App\Project');
    }

    public function project_manager(){
        return $this->belongsTo('App\ProjectManager');
    }


    /**
     * Function to detect if user is an admin
     */
    public function checkAdmin(){

       if($this->role->name == "Administrator" && $this->is_active == 1){

          return true;
        }

        return false;

    }

}
