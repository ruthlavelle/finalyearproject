<?php

namespace App\Http\Controllers;

use App\Department;
use App\Driver;
use App\Project;
use App\ProjectManager;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserProjectsController extends Controller
{
    public function index()
    {

        $project = Project::where('user_id',Auth::user()->id)->get();

        $departments = Department::lists('name', 'id')->all();

        $drivers = Driver::lists('name', 'id')->all();

        $project_managers = ProjectManager::with('user')->get();

        $pms = [];

        foreach($project_managers as $pm){
            $pms[$pm->id] = $pm->user->name;
        }

        return view('users.projects.index', compact('project', 'pms', 'departments', 'drivers'));
    }
}
