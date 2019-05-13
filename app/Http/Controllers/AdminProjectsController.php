<?php

namespace App\Http\Controllers;

use App\Department;
use App\Driver;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Project;
use App\RAG;
use App\Status;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        $departments = Department::lists('name', 'id')->all();
        $drivers = Driver::lists('name', 'id')->all();
        $RAG = RAG::lists('name', 'id')->all();

        $project_managers = User::where('role_id','3')->lists('name', 'id')->all();

        return view('admin.projects.index', compact('projects', 'departments', 'drivers', 'RAG', 'project_managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::lists('name', 'id')->all();
        $drivers = Driver::lists('name', 'id')->all();

        return view('admin.projects.create', compact('departments','drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        $user->project()->create($input);

        //If the user is an administrator
        //Redirect to the admin projects index page
        if($user->role_id == 1) {
            return redirect('/admin/projects');
        }

        //For any other type of user, redirect to a list of
        //the user's project requests
        else {
            return redirect('/users/projects/approvals');
        }



    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);

        $drivers = Driver::lists('name', 'id')->all();

        $rags = RAG::lists('name', 'id')->all();

        $statuses = Status::lists('name', 'id')->all();

        $departments = Department::lists('name', 'id')->all();

        $project_managers = User::where('role_id','3')->pluck('name', 'name')->all();


        return view('admin.projects.edit', compact('project', 'drivers', 'departments', 'rags',  'statuses', 'project_managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $input = $request->all();

        $project->update($input);

        return redirect('/admin/projects');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();

        return redirect('/admin/projects');
    }

    public function project($id){

        //Pulls an array of information with the $id of the project
        //from the projects table
        $project = Project::findOrFail($id);

        //Pulls an an array of users from the users table
        $users = User::lists('name', 'id')->all();

        //Pulls an array of RAGs from the RAGs table
        $RAG = RAG::lists('name', 'id')->all();

        //Pulls an array of comments from the comments table
        $comments = $project->comments()->get();

        //returns the 'project-home' view to the user and passes the arrays above
        return view('admin.projects.project-home', compact('project', 'users', 'RAG', 'comments'));
    }

    //Stores status updates to the database for projects
    public function status(Request $request, $id)
    {
        //Find the project with a particular id
        $project = Project::findOrFail($id);

        //store data in $input
        $input = $request->all();

        //update project with the data in input
        $project->update($input);

        //Redirect back to the page the user was on
        return redirect()->back();
    }


}
