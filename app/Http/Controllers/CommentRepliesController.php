<?php

namespace App\Http\Controllers;

use App\CommentReply;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
{

    public function createReply(Request $request)
    {
        //store the logged in user
        $user = Auth::user();

        //Store data about the reply in an array called $data
        $data = [

            'comment_id' => $request->comment_id,
            'author' => $user->name,
            'body' => $request->body
        ];

        //Create a reply with information from $data
        CommentReply::create($data);

        //Redirect user back to the screen they were on
        return redirect()->back();
    }

}
