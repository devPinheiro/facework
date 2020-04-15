
<?php

namespace App\Http\Controllers\Auth\API;


use App\User;
use App\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Mail\TestEmail;
use App\Mail\AdminEMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $avatar = rand(1,800);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
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

        $message = '';
        Mail::to($user->email)->send(new TestEmail($user));
        Mail::to('ifeoluwa@facework.com.ng')->send(new AdminEmail($user));

        return $user;
    }
}
