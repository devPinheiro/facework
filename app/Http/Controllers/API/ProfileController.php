<?php

namespace App\Http\Controllers\API;

use Session;
use App\User;
use App\Profile;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JD\Cloudder\Facades\Cloudder;
use Auth;

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ProfileController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request, $id)
    {
        //
        $profile = User::findOrFail($id)->profile; //Find profile of user with id = $id
        $posts = Post::with('profile')->Where('profile_id', $id)->orderBy('id', 'desc')->paginate(15);
        $user = auth()->user();
        $isFollowing = $user->isFollowing($id);
        return response()->json(['isFollowing' => $isFollowing, 'profile' => $profile, 'posts'=> $posts]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $profile = User::findOrFail($id)->profile; //Find profile of user with id = $id    
        return response()->json([
            "data" => $profile
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile, $id)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'service' => 'required',
            'image' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000'
        ]);

            $profile = Profile::where('user_id', $id)->first();
            if($profile){

            
            $user = User::find($profile->user_id);

            if($user){
                $user->email = $request->email;
                $user->save();
            } else{
                return response()->json([
                    "message" => "user not found"
                ]);
            }
    
               
                $image = $request->file('image');
    
                $name = $image->getClientOriginalName();
    
                $image_name =  $image->getRealPath();
                
                // uploads to cloudinary
                Cloudder::upload($image_name, null);
    
                list($width, $height) = getimagesize($image_name);
                // gets image url from cloudinary
                $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
    
    
                $profile->image = $image_url; 
                   
            
            $profile->name = $request->name;

            $profile->about = $request->about;

            $profile->phone = $request->phone;

            $profile->address = $request->address;
            
            $profile->state = $request->state;
            
            $profile->service = $request->service;

            $profile->facebook = $request->facebook;

            $profile->twitter = $request->twitter;
            
            $profile->instagram = $request->instagram;
            
            // if($request->role != 'Active'){
            //    $profile->user->assignRole('Active');
            // }
            
               
            $profile->save();            

            return response()->json([
                "success" => "Profile successfully updated"
            ]);
        }

        return response()->json([
            "message" => "User not found"
        ], 404);     
            
    }

    public function changeProfileImage(Request $request,Profile $profile, $id){
          
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000'
        ]);

         $profile = Profile::find($id);

        if($request->hasFile('image')){
           
            $image = $request->file('image');

            $name = $image->getClientOriginalName();

            $image_name =  $image->getRealPath();
            
            // uploads to cloudinary
            Cloudder::upload($image_name, null);

            list($width, $height) = getimagesize($image_name);
            // gets image url from cloudinary
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);


            $profile->image = $image_url; 
               
            $profile->save();
            
        }

            return response()->json([
                "success" => "Profile successfully updated"
            ]);

    }

    //   public function changeCoverImage(Request $request,Profile $profile, $id){
          
    //     $this->validate($request, [
    //         'coverImage' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000'
    //     ]);

    //      $profile = Profile::find($id);

    //     if($request->hasFile('coverImage')){
           
    //         $image = $request->file('coverImage');

    //         $name = $image->getClientOriginalName();

    //         $image_name = $image->getRealPath();
            
    //         // uploads to cloudinary
    //         Cloudder::upload($image_name, null);

    //         list($width, $height) = getimagesize($image_name);
    //         // gets image url from cloudinary
    //         $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);

    //         $profile->coverImage = $image_url; 
               
    //         $profile->save();
            
    //     }

    //         Session::flash('success','You have successfully updated your profile  cover image');

    //         return redirect()->back();

    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Profile  $profile
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Profile $profile)
    // {
    //     //
    // }
}
