<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * Name of the users table in the database
     * which is associated with this model
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden from arrays.
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Relationship to the roles table in the database
     */
    public function role(){
        return $this->belongsTo('App\Role');
    }

    /*
     * Relationship to the projects table
     */
    public function project(){
       return $this->hasMany('App\Project');
    }

    /**
     * Method to detect if user role is admin
     */
    public function checkAdmin(){

       if($this->role->name == "Administrator" && $this->is_active == 1){

         return true;
        }

        return false;

    }

    /*
     * Method to detect if user role is User
     */
    public function checkUser()
    {
        if($this->role->name == "User" && $this->is_active == 1){

            return true;
        }

        return false;

    }

    /*
     * Method to detect if user role is project manager
     */
    public function checkPM()
    {
        if($this->role->name == "Project Manager" && $this->is_active == 1){

            return true;
        }

        return false;

    }

}
