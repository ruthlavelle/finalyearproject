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

    public function edit($id)
    {
        $status = Status::findOrFail($id);

        return view('admin.status.edit', compact('status'));
    }

    public function store(Request $request)
    {
        Status::create($request->all());

        return redirect('/admin/status');
    }

    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);

        $input = $request->all();

        $status->update($input);

        return redirect('/admin/status');
    }

    public function destroy($id)
    {
        Status::findOrFail($id)->delete();

        return redirect('/admin/status');
    }
}
