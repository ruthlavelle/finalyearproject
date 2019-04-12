<?php

namespace App\Http\Controllers;

use App\Status;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminStatusController extends Controller
{

    public function index()
    {
        $status = Status::all();

        return view('admin.status.index', compact('status'));
    }

    public function store(Request $request)
    {
        Status::create($request->all());

        return redirect('/admin/status');
    }

    public function destroy($id)
    {
        Status::findOrFail($id)->delete();

        return redirect('/admin/status');
    }
}
