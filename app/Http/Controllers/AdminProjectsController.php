<?php

namespace App\Http\Controllers;

use App\Department;
use App\Driver;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\EditProjectRequest;
use App\Project;
use App\RAG;
use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
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

        Session::flash('project_created', 'New Project Created');

        $user = Auth::user();

        $user->projects()->create($input);

        return redirect('/admin/projects');
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

        return view('admin.projects.edit', compact('project', 'drivers', 'departments', 'rags', 'statuses'));
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
        $input = $request->all();

        Session::flash('project_updated', 'Project has been updated');

        Auth::user()->projects()->whereId($id)->first()->update($input);

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

        Session::flash('project_deleted', 'Project Deleted');

        return redirect('/admin/projects');
    }
}
