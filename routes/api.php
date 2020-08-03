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

        Route::get('signup/activate/{token}', 'API\AuthController@signupActivate');
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

// Feeds endpoint
Route::group([     
    'namespace' => 'API',    
    'prefix' => 'feeds'
], function () {    
    Route::get('/', 'PostController@feeds');
    Route::middleware('auth:api')->post('/create', 'PostController@createPost');
    Route::get('/{id}', 'PostController@showPost');
    Route::middleware('auth:api')->put('/edit/{id}', 'PostController@updatePost');
    Route::middleware('auth:api')->delete('/{id}', 'PostController@deletePost');
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
