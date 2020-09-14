<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comments;

class CommentController extends Controller
{
    //
     public function store(Request $request) { 

        //Validating body field
        $this->validate($request, [
        'body' => 'required'     
        ]);

        $comment = Comments::create([
          'post_id' => $request->post_id,
          'body' => $request->body,
          'profile_id' => $request->profile_id,
        ]);
        $comment->body = $request->body;
        $comment->save();

        //return to current page upon save
        return response()->json([
            "data" => $comment
        ]);
    }

}
