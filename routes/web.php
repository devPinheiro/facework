<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/test', function(){
   return App\Profile::all()->user;
});

Route::get('/search', function(){
    if(request('query_service') !== null && request('query_location') !== null){
        $results = App\Profile::where('service','like','%'.request('query_service').'%')
                                ->where('state','like','%'.request('query_location').'%' )
                                ->get();      
       return view('search.search')->with('results', $results);
    } else {
        $results = null;
        return view('search.search')->with('results', $results);
    }
     
});

Route::get('/', 'PostController@home');
Auth::routes();

Route::get('/posts', 'PostController@index');

Route::resource('users', 'UserController');

Route::get('/verified-profile/{id}', 'PostController@showUser');

Route::resource('roles', 'RoleController');

Route::resource('profile', 'ProfileController');

Route::resource('broadcast', 'BroadcastController');

Route::resource('advert', 'AdvertController');

Route::resource('job', 'JobsController');

Route::get('/jobs',[
    'uses' => 'JobsController@showAll',
    'as' => 'job.show'
]);

Route::resource('job_category', 'JobsCategoryController');

//Profile
Route::post('/profile/changeProfileImage/{id}',[
    'uses' => 'ProfileController@changeProfileImage',
    'as' => 'profileImage.update'
]);

//Profile
Route::get('/profile/dashboard/{id}',[
    'uses' => 'ProfileController@dashboard',
    'as' => 'profile.index'
]);

Route::post('/profile/changeCoverImage/{id}',[
    'uses' => 'ProfileController@changeCoverImage',
    'as' => 'CoverImage.update'
]);

Route::post('/profile/update/{id}',[
    'uses' => 'ProfileController@update',
    'as' => 'profile.update'
]);

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');

Route::resource('task', 'TaskController');

Route::post('/posts/create',[
    'uses' => 'PostController@store',
    'as' => 'posts.store'
]);


//Settings
Route::get('/site/settings',[
'uses' => 'SettingController@index',
'as' => 'settings'
]);

Route::post('/site/settings/create',[
'uses' => 'SettingController@store',
'as' => 'settings.store'
]);

Route::post('/site/settings/update',[
'uses' => 'SettingController@update',
'as' => 'settings.update'
]);


//Like middleware
Route::middleware('auth')->get('/post/like/{id}',[
'uses' => 'PostController@like',
'as' => 'post.like'
]);

Route::middleware('auth')->get('/post/unlike/{id}',[
'uses' => 'PostController@unlike',
'as' => 'post.unlike'
]);

// Comment section
Route::post('/add-comment', [
   'uses' => 'CommentController@store',
   'as' => 'comment.post'
]);

// Explore section
Route::get('/explore', [
   'uses' => 'PostController@explore',
   'as' => 'explore'
]);

Route::get('/push', function () {
    return view("welcome");
});