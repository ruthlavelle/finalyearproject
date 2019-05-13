<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProjectCommentsController extends Controller
{

    /**
     * Stores Comments to the Database
     */
    public function store(Request $request)
    {
        //Get the logged in user
        $user = Auth::user();

        //Capture information about the comment and store
        //it to an array called $data
        $data = [

            'project_id' => $request->project_id,
            'author' => $user->name, //logged in user's name
            'body' => $request->body
        ];

        //create a comment with information in $data
        Comment::create($data);

        //Redirect user to the screen they were on
        return redirect()->back();
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back();
    }
}
