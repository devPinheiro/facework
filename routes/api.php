<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth endpoint
Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::post('login', 'API\AuthController@login');
        Route::post('signup', 'API\AuthController@signup');

        Route::group([
        'middleware' => 'auth:api'
        ], function() {
            Route::get('logout', 'API\AuthController@logout');
            Route::get('user', 'API\AuthController@user');
        });

        Route::post('signup/activate/{token}', 'API\AuthController@signupActivate');
    });

Route::group([    
    'namespace' => 'API',    
    'middleware' => 'api',    
    'prefix' => 'password'
], function () {    
    Route::post('create', 'PasswordResetController@create');
    Route::get('reset/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

// User profile endpoint
Route::group([     
    'namespace' => 'API',    
    'prefix' => 'profile'
], function () {    
    Route::get('/{id}', 'ProfileController@dashboard');
    Route::middleware('auth:api')->patch('/edit/{id}', 'ProfileController@update');
    Route::middleware('auth:api')->patch('/edit/upload-profile-image/{id}', 'ProfileController@changeProfileImage');
});

// Followers endpoint
Route::group(['middleware' => 'auth:api', 'namespace' => 'API',    
'prefix' => 'users'], function () {
    Route::get('/followers', 'UsersController@followers')->name('users');
    Route::get('/following', 'UsersController@following')->name('following');
    Route::post('/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');
});

// Notification endpoint
Route::group([ 'middleware' => 'auth:api',    'namespace' => 'API' ], function () {
    // ...
    Route::get('/notifications', 'UsersController@notifications');
    Route::get('/notifications/read', 'UsersController@markAllNotificationsAsRead');
});

// Jobs endpoint
Route::group([     
    'namespace' => 'API',    
    'prefix' => 'jobs'
], function () {    
    Route::get('/', 'JobsController@showAll');
    Route::get('/{id}', 'JobsController@show');
});

// Feeds endpoint
Route::group([     
    'namespace' => 'API',    
    'prefix' => 'feeds'
], function () {    
    Route::get('/', 'PostController@feeds');
    Route::middleware('auth:api')->post('/create', 'PostController@createPost');
    Route::get('/{id}', 'PostController@showPost');
    Route::middleware('auth:api')->patch('/edit/{id}', 'PostController@updatePost');
    Route::middleware('auth:api')->delete('/{id}', 'PostController@deletePost');
});

// Comment endpoint
Route::group([     
    'namespace' => 'API',    
    'prefix' => 'comments'
], function () {    
    Route::middleware('auth:api')->post('/create', 'CommentController@store');
});

Route::middleware('cors')->get('/skills',[
        'uses'       =>      'Query@getSkills',
        'as'         =>      'get-skills'
    ]);

Route::middleware('cors')->post('/feedback',[
        'uses'       =>      'FeedbackController@store',
        'as'         =>      'send-feedback'
    ]);

Route::middleware('cors')->get('/feedback-all',[
        'uses'       =>      'FeedbackController@index',
        'as'         =>      'get-feedback'
    ]);
