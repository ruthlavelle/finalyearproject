<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index(){

        $redRagCount = Project::where('RAG_id', '=', '1')->count();
        $amberRagCount = Project::where('RAG_id', '=', '2')->count();
        $greenRagCount = Project::where('RAG_id', '=', '3')->count();

        return view('admin/index', compact('redRagCount', 'amberRagCount', 'greenRagCount' ));
    }
}
