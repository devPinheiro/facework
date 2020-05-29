<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\TestEmail;
use App\Mail\AdminEMail;
use GuzzleHttp\Client;

class RegisterController extends Controller
{

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
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
             'image' => 'https://ui-avatars.com/api/?name='.$user->name.'?&rounded=true&background=FFFFFF',
             'coverImage' => ''
        ]);

        // $message = '';
        // Mail::to($user->email)->send(new TestEmail($user));
        // Mail::to('ifeoluwa@facework.com.ng')->send(new AdminEmail($user));

        // return dd($user);

        $http = new Client;

        $response = $http->post(url('oauth/token'), [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 2,
                'client_secret' => 'ekUOTQHPUKeSscLFNceQ9HKRoo5238DynIBjP3Qg',
                'username' => $request->email,
                'password' => $request->password
            ],
        ]);
        // return $user;

        return response(['data' => json_decode((string) $response->getBody(), true)]);
        

    }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
