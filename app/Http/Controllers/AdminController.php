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

        $activeStatusCount = Project::where('status_id', '=', '1')->count();
        $plannedStatusCount = Project::where('status_id', '=', '2')->count();
        $closedStatusCount = Project::where('status_id', '=', '3')->count();
        $rejectedStatusCount = Project::where('status_id', '=', '4')->count();




        return view('admin/dashboard', compact('redRagCount', 'amberRagCount', 'greenRagCount', 'activeStatusCount', 'plannedStatusCount', 'closedStatusCount', 'rejectedStatusCount', 'deptLabels', 'deptData'));
    }
}
