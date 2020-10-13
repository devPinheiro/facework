<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use JD\Cloudder\Facades\Cloudder;
use PeterPetrus\Auth\PassportToken;

use App\Notifications\NewPost;
use App\Profile;
use App\Post;
use Auth;
use Session;
use App\User;
use App\Jobs;
use App\Like;
use App\Setting;
use App\Broadcast;
use App\Advert;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function feeds(){
    
        $posts = Post::with('profile')->orderBy('id', 'desc')->paginate(7);

        return response()->json([
            "post" => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request) {         

        $decoded_token = PassportToken::dirtyDecode(substr($request->header()['authorization'][0], 7));

        if ($decoded_token['valid']) {
            // Check if token exists in DB (table 'oauth_access_tokens'), require \Illuminate\Support\Facades\DB class
            $token_exists = PassportToken::existsValidToken(
                $decoded_token['token_id'], 
                $decoded_token['user_id']
            );
            
            if ($token_exists) {
                // Validating title and body field
            $this->validate($request, [
               
                'title' => 'required|max:255',
                'featured' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
                'body' => 'required'
                
                ]);
        
        
               $image = $request->file('featured');
        
               $name = $request->file('featured')->getClientOriginalName();
        
               $image_name = $request->file('featured')->getRealPath();
               
               // uploads to cloudinary
               Cloudder::upload($image_name, null);
        
               list($width, $height) = getimagesize($image_name);
               // gets image url from cloudinary
               $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
        
                // get user profile 
                $user = User::find($decoded_token['user_id']);
                $profile_id = $user->profile->id;
                $post = Post::create([      
        
                    'title' => $request->title,
        
                    'profile_id' => $profile_id,
        
                    'body' => $request->body,
        
                    'featured' => $image_url,
        
                ]);
        
                
                // // get user profile
                // $userProfile = User::with('profile')->find($user->id);
                // // sending a notification
                // $user->notify(new NewPost($userProfile, $post));
        
                //Display a successful message upon save
                return response()->json([
                    "data" => $post
                ]);
            }
        }
       
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPost($id) {
        $like = false;
        $post = Post::with('comments')->with('profile')->find($id); //Find post of id = $id
        if($post){
            // $profile_id = $post->profile->id; // find profile id of the owner of the post
            // $profile = Profile::findorfail($profile_id);
            $comments = Post::find($id)->comments; // comments attached to each post
            return response()->json([
                "data" => [$post]
            ]);
        }
        return response()->json([
            "message" => "post not found"
        ]);
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id) {


        $decoded_token = PassportToken::dirtyDecode(substr($request->header()['authorization'][0], 7));

        if ($decoded_token['valid']) {
            // Check if token exists in DB (table 'oauth_access_tokens'), require \Illuminate\Support\Facades\DB class
            $token_exists = PassportToken::existsValidToken(
                $decoded_token['token_id'], 
                $decoded_token['user_id']
            );
            
            $post = Post::where('id', $id)->first();
            if($post){
                if ($token_exists && $post->profile_id === $decoded_token['user_id']) {
        
                        $this->validate($request, [
                        'title' => 'required',
                        'body' => 'required'
                        
                    ]);          

                    if($request->hasFile('featured')){
                        
                        $featured = $request->featured;

                        $featured_new_name = time().$featured->getCientOriginalName();

                        $featured = move('uploads/posts/', $featured_new_name);

                    }

                        $post->title = $request->title;

                        $post->body = $request->body;
                        
                        $post->$featured = $request->$featured;
                            
                        $post->save();

                    return response()->json([
                        "data" => $post
                    ]);
                } else {
                    return response()->json([
                        "message" => "You do not have access permission to edit this post"
                    ], 401);
                }
            }
            return response()->json([
                "message" => "Post not found"
            ], 404);
            
        }

   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deletePost(Request $request, $id) {

        $decoded_token = PassportToken::dirtyDecode(substr($request->header()['authorization'][0], 7));

        if ($decoded_token['valid']) {
            // Check if token exists in DB (table 'oauth_access_tokens'), require \Illuminate\Support\Facades\DB class
            $token_exists = PassportToken::existsValidToken(
                $decoded_token['token_id'], 
                $decoded_token['user_id']
            );
            
            if ($token_exists) {
                $post = Post::findOrFail($id);
                $post->delete();

                return response()->json([
                    "message" => "Post deleted successfully"
                ]);
                }
        }
    }
}
