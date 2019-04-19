<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){

        return view('admin/index');
    }

    public function dashboard(){

        $redRagCount = Project::where('RAG_id', '=', '1')->count();
        $amberRagCount = Project::where('RAG_id', '=', '2')->count();
        $greenRagCount = Project::where('RAG_id', '=', '3')->count();

        return view('admin/dashboard', compact('redRagCount', 'amberRagCount', 'greenRagCount' ));
    }
}
