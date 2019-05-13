<?php

namespace App\Http\Controllers;

use App\Department;
use App\Driver;
use App\Project;
use App\Status;
use App\RAG;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserProjectsController extends Controller
{
    public function index()
    {

        //Pulls an array of projects with a user_id equal to
        //the id of the logged in user
        $project = Project::where('user_id', Auth::user()->id)->orderBy('status_id', 'asc')->get();

        //Takes name of each status from the database with
        //its id so that the name can be displayed
        $statuses = Status::lists('name', 'id')->all();

        return view('users.projects.index', compact('project', 'statuses'));
    }

    public function approvals()
    {

        //Pulls an array of projects with a user_id equal to
        //the id of the logged in user
        $project = Project::where('user_id', Auth::user()->id)->get();

        return view('users.projects.approvals', compact('project'));
    }
}