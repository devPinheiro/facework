<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\Profile;
use App\Post;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

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
    public function dashboard($id)
    {
        //
        $profile = User::findOrFail($id)->profile; //Find profile of user with id = $id
        $posts = Post::orderby('id', 'desc')->paginate(5);
        return view('profile.index')->with('profile', $profile)->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $profile = Auth()->user()->profile;
         $posts = Post::orderby('id', 'desc')->paginate(10);
         return view('profile.create', compact('profile','posts'));
         
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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $profile = User::findOrFail($id)->profile; //Find profile of user with id = $id    
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $profile = User::findOrFail($id)->profile; //Find a profile based on a user
        $roles = Role::get();
        return view('profile.edit', compact('profile'));
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
            'service' => 'required'
        ]);

            $profile = Profile::find($id);
            
            $profile->name = $request->name;

            $profile->about = $request->about;

            $profile->phone = $request->phone;

            $profile->address = $request->address;
            
            $profile->state = $request->state;
            
            $profile->service = $request->service;
            
            if($request->role != 'Active'){
               $profile->user->assignRole('Active');
            }
            
               
            $profile->save();            

            Session::flash('success','You have successfully updated your profile');

            return redirect()->back();
                
            
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

            Session::flash('success','You have successfully updated your profile image');

            return redirect()->back();

    }

      public function changeCoverImage(Request $request,Profile $profile, $id){
          
        $this->validate($request, [
            'coverImage' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000'
        ]);

         $profile = Profile::find($id);

        if($request->hasFile('coverImage')){
           
            $image = $request->file('coverImage');

            $name = $image->getClientOriginalName();

            $image_name = $image->getRealPath();
            
            // uploads to cloudinary
            Cloudder::upload($image_name, null);

            list($width, $height) = getimagesize($image_name);
            // gets image url from cloudinary
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);


            $profile->coverImage = $image_url; 
               
            $profile->save();
            
        }

            Session::flash('success','You have successfully updated your profile  cover image');

            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
