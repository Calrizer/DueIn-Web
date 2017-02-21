<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Home Route

Route::get('/', [
    'uses' => 'NavigationController@gotoLanding',
    'as' => 'nav.landing'
]);

Route::group(['middleware' => 'guest'], function (){
    //Sign Up and Sign In Navigation Routes

    Route::get('signin', [
        'uses' => 'NavigationController@gotoSignin',
        'as' => 'nav.signin'
    ]);

    Route::get('signup', [
        'uses' => 'NavigationController@gotoSignup',
        'as' => 'nav.signup'
    ]);

//Sign Up and Sign In Form Submission Routes

    Route::post('signin', [
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'
    ]);

    Route::post('signup', [
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
    ]);
});

Route::group(['middleware' => 'auth'], function (){

    Route::get('logout', [
        'uses' => 'UserController@getLogout',
        'as' => 'user.logout'
    ]);

    //Create Task Navigation Route

    Route::get('new', [
        'uses' => 'NavigationController@createTask',
        'as' => 'nav.new'
    ]);

    //Create Task Form Submission Route

    Route::post('new', [
        'uses' => 'TaskController@createTask',
        'as' => 'task.create'
    ]);

    Route::get('user/{username}', [
        'uses' => 'UserController@showProfile',
        'as' => 'user.profile'
    ]);

    Route::post('task/{id}', [
        'uses' => 'TaskController@addTask',
        'as' => 'task.add'
    ]);

    Route::get('task/{id}/delete', [
        'uses' => 'TaskController@deleteTask',
        'as' => 'task.delete'
    ]);

    Route::get('task/{id}/remove', [
        'uses' => 'TaskController@removeTask',
        'as' => 'task.remove'
    ]);
});

//Takes a given TaskID and renders view with task information

Route::get('task/{id}', [
    'uses' => 'TaskController@getTask',
    'as' => 'task.get'
]);

Route::get('verify/{id}', [
    'uses' => 'UserController@verify',
    'as' => 'user.verify'
]);

//API Routes

Route::get('api/user', [
   'uses' => 'APIController@getUser',
    'as' => 'api.user'
]);

Route::get('api/userinfo', [
    'uses' => 'APIController@getUserInfo',
    'as' => 'api.userinfo'
]);

Route::get('api/set', [
    'uses' => 'APIController@getUserTasks',
    'as' => 'api.set'
]);

Route::get('api/task', [
    'uses' => 'APIController@getTask',
    'as' => 'api.task'
]);

Route::get('api/add', [
    'uses' => 'APIController@addTask',
    'as' => 'api.add'
]);

Route::get('api/remove', [
    'uses' => 'APIController@removeTask',
    'as' => 'api.remove'
]);

Route::get('api/delete', [
    'uses' => 'APIController@deleteTask',
    'as' => 'api.delete'
]);

Route::get('api/complete', [
    'uses' => 'APIController@completeTask',
    'as' => 'api.complete'
]);

Route::get('api/uncomplete', [
    'uses' => 'APIController@uncompleteTask',
    'as' => 'api.uncomplete'
]);