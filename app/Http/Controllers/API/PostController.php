<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use JD\Cloudder\Facades\Cloudder;
use PeterPetrus\Auth\PassportToken;

use App\Notifications\GeneralNofication;
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
    public function index()
    {
        //
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
        
                // send noitfication
                  $user = User::where('id','!=',$decoded_token['user_id'])->get();
        
                 \Notification::send($user, new GeneralNofication(Post::latest('id')->first()));
        
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
        $post = Post::findOrFail($id); //Find post of id = $id
        $profile_id = $post->profile->id; // find profile id of the owner of the post
        $profile = Profile::findorfail($profile_id);
        $comments = Post::find($id)->comments; // comments attached to each post
        return response()->json([
            "data" => [$post, $comments]
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
            
            if ($token_exists) {
        
                    $this->validate($request, [
                    'title' => 'required',
                    'body' => 'required'
                    
                ]);

                $post = Post::find($id);

                if($request->hasFile('featured')){
                    
                    $featured = $request->featured;

                    $featured_new_name = time().$featured->getCientOriginalName();

                    $featured = move('uploads/posts/', $featured_new_name);

                }

                    $post->title = $request->title;

                    $post->body = $request->body;
                        
                    $post->save();

                return response()->json([
                    "data" => $post
                ]);
            }
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
