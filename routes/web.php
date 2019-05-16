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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', '\App\Http\Controllers\HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    
    Route::post('/api/get_permission', '\App\Http\Controllers\RestController@apiGetPermission');

});



Route::prefix('user')->group(function () {

    Route::get('/',
        [
            'middleware' => ['auth','perm:user.view'], 
            'uses'=>'\App\Http\Controllers\UserController@index'
        ])
        ->name('user.index');

    Route::get('/create',
        [
            'middleware' => ['auth','perm:user.create'], 
            'uses'=>'\App\Http\Controllers\UserController@create'
        ])
        ->name('user.create');

    Route::post('/',
        [
            'middleware' => ['auth','perm:user.create'], 
            'uses'=>'\App\Http\Controllers\UserController@store'
        ])
        ->name('user.store');

    Route::delete('/{id}',
        [
            'middleware' => ['auth','perm:user.delete'], 
            'uses'=>'\App\Http\Controllers\UserController@destroy'
        ])
        ->name('user.destroy');

    Route::get('/{id}',
        [
            'middleware' => ['auth','perm:user.view'], 
            'uses'=>'\App\Http\Controllers\UserController@show'
        ])
        ->name('user.show');

    Route::get('/{id}/edit',
        [
            'middleware' => ['auth','perm:user.update'], 
            'uses'=>'\App\Http\Controllers\UserController@edit'
        ])
        ->name('user.edit');

    Route::put('/{id}',
        [
            'middleware' => ['auth','perm:user.update'], 
            'uses'=>'\App\Http\Controllers\UserController@update'
        ])
        ->name('user.update');
});


Route::prefix('group')->group(function () {

    Route::get('/',
        [
            'middleware' => ['auth','perm:group.view'], 
            'uses'=>'\App\Http\Controllers\GroupController@index'
        ])
        ->name('group.index');

    Route::get('/create',
        [
            'middleware' => ['auth','perm:group.create'], 
            'uses'=>'\App\Http\Controllers\GroupController@create'
        ])
        ->name('group.create');

    Route::post('/',
        [
            'middleware' => ['auth','perm:group.create'], 
            'uses'=>'\App\Http\Controllers\GroupController@store'
        ])
        ->name('group.store');

    Route::delete('/{id}',
        [
            'middleware' => ['auth','perm:group.delete'], 
            'uses'=>'\App\Http\Controllers\GroupController@destroy'
        ])
        ->name('group.destroy');

    Route::get('/{id}',
        [
            'middleware' => ['auth','perm:group.view'], 
            'uses'=>'\App\Http\Controllers\GroupController@show'
        ])
        ->name('group.show');

    Route::get('/{id}/edit',
        [
            'middleware' => ['auth','perm:group.update'], 
            'uses'=>'\App\Http\Controllers\GroupController@edit'
        ])
        ->name('group.edit');

    Route::put('/{id}',
        [
            'middleware' => ['auth','perm:group.update'], 
            'uses'=>'\App\Http\Controllers\GroupController@update'
        ])
        ->name('group.update');
});




//PERMISSION
Route::prefix('permission')->group(function () {

    Route::get('/',
        [
            'middleware' => ['auth','perm:permission.view'], 
            'uses'=>'\App\Http\Controllers\PermissionController@index'
        ])
        ->name('permission.index');

    Route::get('/create',
        [
            'middleware' => ['auth','perm:permission.create'], 
            'uses'=>'\App\Http\Controllers\PermissionController@create'
        ])
        ->name('permission.create');

    Route::post('/',
        [
            'middleware' => ['auth','perm:permission.create'], 
            'uses'=>'\App\Http\Controllers\PermissionController@store'
        ])
        ->name('permission.store');

    Route::delete('/{id}',
        [
            'middleware' => ['auth','perm:permission.delete'], 
            'uses'=>'\App\Http\Controllers\PermissionController@destroy'
        ])
        ->name('permission.destroy');

    Route::get('/{id}',
        [
            'middleware' => ['auth','perm:permission.view'], 
            'uses'=>'\App\Http\Controllers\PermissionController@show'
        ])
        ->name('permission.show');

    Route::get('/{id}/edit',
        [
            'middleware' => ['auth','perm:permission.update'], 
            'uses'=>'\App\Http\Controllers\PermissionController@edit'
        ])
        ->name('permission.edit');

    Route::put('/{id}',
        [
            'middleware' => ['auth','perm:permission.update'], 
            'uses'=>'\App\Http\Controllers\PermissionController@update'
        ])
        ->name('permission.update');
});





//SAMPLE AJA

Route::group(['middleware' => ['auth', 'group:user']], function () {
    
	Route::get('/khusususer', '\App\Http\Controllers\HomeController@index');

});