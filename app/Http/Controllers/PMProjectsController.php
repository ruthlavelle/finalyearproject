<?php

namespace App\Http\Controllers;

use App\Department;
use App\Driver;
use App\Project;
use App\RAG;
use App\Status;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PMProjectsController extends Controller
{
    public function index()
    {
        //Pulls projects from the database where the logged in user
        //is assigned as a project manager
        $projects = Project::where('project_manager',Auth::user()->name)->orderBy('status_id', 'asc')->get();

        //Pulls the name of project managers so that it can be displayed
        //when the project manager attribute is referenced
        $project_managers = User::where('role_id','3')->lists('name', 'id')->all();

        //Pulls the name of departments so that it can be displayed
        //when the department_id attribute is referenced
        $departments = Department::lists('name', 'id')->all();

        //Pulls an array of statuses from the status table so that there
        //name can be displayed instead of their id
        $statuses = Status::lists('name', 'id')->all();

        return view('pms.index', compact('projects', 'departments', 'project_managers', 'statuses'));
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


        return view('pms.edit', compact('project', 'drivers', 'departments', 'rags',  'statuses', 'project_managers'));
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

        return redirect('/projectmanager/projects');
    }
}
