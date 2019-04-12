<?php

namespace App\Http\Controllers;

use App\Department;
use App\Driver;
use App\Http\Requests;
use App\Http\Requests\CreateProjectRequest;
use App\Project;
use App\ProjectManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        $project_managers = ProjectManager::with('user')->get();

        $departments = Department::lists('name', 'id')->all();

        $drivers = Driver::lists('name', 'id')->all();

        $pms = [];

        foreach($project_managers as $pm){
            $pms[$pm->id] = $pm->user->name;
        }

        return view('front.home', compact('projects', 'pms', 'departments', 'drivers'));
    }

    public function create()
    {
        $departments = Department::lists('name', 'id')->all();
        $drivers = Driver::lists('name', 'id')->all();

        return view('front.home', compact('departments','drivers'));
    }

    public function store(CreateProjectRequest $request){
        Project::create($request->all());

        Session::flash('project_created', 'New Project Created');


        return redirect('/');
    }
}
