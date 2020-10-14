<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Image;
use App\User;
use Auth;
use App\Profile;
use App\Post;
use App\feedback;
use App\Notifications\UserFollowed;


//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UsersController extends Controller {

    public function __construct() {
        // $this->middleware(['auth',  'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index() {
    //Get all users and pass it to the view
        $posts = Post::all();
        $users = User::all();
        $feedback = feedback::all();
        return view('users.index')->with('users', $users)->with('posts', $posts)->with('feedback', $feedback);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
    //Get all roles and pass it to the view
        $roles = Role::get();
        return view('users.create', ['roles'=>$roles]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
   //Validate name, email and password fields  
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed'
        ]);
                
                        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
                    
                        $roles = $request['roles']; //Retrieving the roles field

                          $user = User::create([
                                'name' => $request->input('name'),
                                'email' => $request->input('email'),
                                'password' => $request->input('password'),
                            ]);

                            Profile::create([
                                'user_id' => $user->id,
                                'name' => $user->name,
                                'email' => $user->email,
                                'service' => '',
                                'about' => '',
                                'phone' => '',
                                'state' => '',
                                'address' => '',
                                'image' => 'https://ui-avatars.com/api/?name='.$user->name.'?&rounded=true&background=FFFFFF'
                            ]);
                       //Checking if a role was selected
                        if (isset($roles)) {

                            foreach ($roles as $role) {
                            $role_r = Role::where('id', '=', $role)->firstOrFail();            
                            $user->assignRole($role_r); //Assigning role to user
                            }
                        }        
                    // $user->fill($user)->save();

                    //Redirect to the users.index view and display message
                    return redirect()->back()->with('flash_message', 'Welcome on board.');
                        
                
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $user = User::findOrFail($id);
        return view('users.show')->with('users', $user); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles

        return view('users.edit', compact('user', 'roles')); //pass user and roles data to view

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields  
        $this->validate($request, [
            'name'=>'required|max:120',
            'email'=>'required|email'      
           
        ]);

    //    if ($request->input('image'))
    //              {
    //                 $name = time().'.'.$request->input('image');
    //                 // $request->image->move('public/images',$name);


                    
                        
    //                     $user->service = $request->input('service');
    //                     $user->phone = $request->input('phone');
    //                     $user->about = $request->input('about');
    //                     $user->address = $request->input('address');
    //                     $user->image = $name;
    //                     $user->save();
                        
                        
                        
                    
    //             }
         
         $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
                    
         $roles = $request['roles']; //Retrieving the roles field
                       //Checking if a role was selected
                        if (isset($roles)) {

                            foreach ($roles as $role) {
                            $role_r = Role::where('id', '=', $role)->firstOrFail();            
                            $user->assignRole($role_r); //Assigning role to user
                            }
                        }   
         $user->save();
        
         return  redirect()->route('users.index') ->with('flash_message', 'User successfully edited.');      
       
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Find a user with a given id and delete
        $user = User::findOrFail($id); 
        $user->delete();

        return redirect()->route('users.index')
            ->with('flash_message',
             'User successfully deleted.');
    }


    public function follow(User $user)
    {
        $follower = auth()->user();
        if(auth()->user()){
            $toFollow = User::find($user->id);
            if($toFollow){
                if ($follower->id == $user->id) {
                    return response()->json(
                        ["data" => "You can't follow yourself ".$user->name]
                    );
                }
                if(!$follower->isFollowing($user->id)) {
                    $follower->follow($user);

                    // get user profile
                    $userProfile = User::with('profile')->find($follower->id);
                    // sending a notification
                    $user->notify(new UserFollowed($userProfile));
        
                    return response()->json(
                        ["data" => "You are now following ".$user->name]
                    );
                }
                return response()->json(
                    ["error" => "You are already following ".$user->name]
                );
            }
            return response()->json([
                'message' => 'No record found'
            ]);
        }
        return response()->json([
            'message' => 'No record found'
        ]);
    }



    public function unfollow(User $user)
    {
        $follower = auth()->user();
        if($follower->isFollowing($user->id)) {
            $follower->unfollow($user->id);
            return response()->json(
                ["message" => "You are no longer following ".$user->name], 200
            );
        }
        return response()->json(
            ["error" => "You are not following ".$user->name],409
        );
    }

    public function followers()
    {
        $follower = auth()->user();
        if($follower) {
            
            return response()->json(
                ["data" => $follower->followers, "count" => $follower->followers()->count()], 200
            );
        }
        return response()->json(
            ["error" => "You are no followers "],404
        );
    }

    public function following()
    {
        $follower = auth()->user();
        if($follower) {
            
            return response()->json(
                ["data" => $follower->followings, "count" => $follower->followings()->count()], 200
            );
        }
        return response()->json(
            ["error" => "You are no following "],404
        );
    }

    /**
    * Fetch all notifications for a specific user
    *
    * 
    * @return \Illuminate\Http\Response
    */
    public function notifications() {
            $notifications = auth()->user()->notifications()->paginate(20);
            return response()->json([
                'data' => $notifications
            ]);
    }


    /**
    * Mark all notifications as read
    *
    * 
    * @return \Illuminate\Http\Response
    */
    public function markAllNotificationsAsRead() {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json([
            'message' => "Notifications marked as read"
        ]);
    }
    
}
