<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comments;
use PeterPetrus\Auth\PassportToken;
class CommentController extends Controller
{
    //
     public function store(Request $request) { 
        $decoded_token = PassportToken::dirtyDecode(substr($request->header()['authorization'][0], 7));

        if ($decoded_token['valid']) {
            // Check if token exists in DB (table 'oauth_access_tokens'), require \Illuminate\Support\Facades\DB class
            $token_exists = PassportToken::existsValidToken(
                $decoded_token['token_id'], 
                $decoded_token['user_id']
            );
            
            if ($token_exists) {

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
    }else {
        //return to current page upon save
        return response()->json(401,[
            "message" => "You are unauthenticated "
        ]);
    }
    }
}