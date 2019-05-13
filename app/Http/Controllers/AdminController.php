<?php

namespace App\Http\Controllers;

use App\Department;
use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){

        return view('admin/index');
    }

    public function dashboard(){

        //count the number of active projects with each RAG status
        $redRagCount = Project::where([
            ['RAG_id', '=', '1'],
            ['status_id', '=', '1'],
            ])->count();
        $amberRagCount = Project::where([
            ['RAG_id', '=', '2'],
            ['status_id', '=', '1'],
        ])->count();
        $greenRagCount = Project::where([
            ['RAG_id', '=', '3'],
            ['status_id', '=', '1'],
        ])->count();;

        //count the number of projects in each status
        $activeStatusCount = Project::where('status_id', '=', '1')->count();
        $plannedStatusCount = Project::where('status_id', '=', '2')->count();
        $closedStatusCount = Project::where('status_id', '=', '3')->count();
        $rejectedStatusCount = Project::where('status_id', '=', '4')->count();

        //return the dashboard view
        return view('admin/dashboard', compact('redRagCount', 'amberRagCount', 'greenRagCount', 'activeStatusCount', 'plannedStatusCount', 'closedStatusCount', 'rejectedStatusCount'));
    }
}
