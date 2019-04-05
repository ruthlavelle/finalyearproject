<?php

namespace App\Http\Controllers;

use App\RAG;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminRAGsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rags = RAG::all();

        return view('admin.rags.index', compact('rags'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        RAG::create($request->all());

        return redirect('/admin/rags');
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
        $rag = RAG::findOrFail($id);

        return view('admin.rags.edit', compact('rag'));
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
        $rag = RAG::findOrFail($id);

        $input = $request->all();

        $rag->update($input);

        return redirect('/admin/rags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RAG::findOrFail($id)->delete();

        return redirect('/admin/rags');
    }
}
