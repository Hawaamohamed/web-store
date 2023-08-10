<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace("Front")->group(function(){

    //all route only access controller or methods in folder name Front
    Route::get('users', 'UserController@showUserName');
});

Route::prefix("users")->group(function(){

    //all route only access controller or methods in folder name Front
    Route::get('show', 'UserController@showUserName');
});
Route::group(['prefix' => 'users', "middleware" => 'auth'], function(){

    //all route only access controller or methods in folder name Front
    Route::get('/', function(){ 
          return 'Work'; 
    });


});

Route::get('check', function(){ 
    return 'middleware'; 
}) -> middleware('auth');



Route::group(["namespace" => 'Admin'], function(){
 
    Route::get('admin', 'AdminController@showAdmin');
});

Route::group(["middleware" => 'auth'], function(){

    Route::get('users', 'UserController@index');

}); 

Route::get("test", function(){ 
    return 
        '<form method="post">   
           <input type="hidden" name="token" value="'.csrf_token().'">
           <input type="text" name="foo">
           <input type="submit" value="submit">
           <input type="hidden" name="_method" value="delete">
        </form>';  
});


Route::post('test', function() { 
    return "welcome to post link". request("foo"); 
});
Route::put('test', function() { return "welcome to put link"; });
Route::delete('test', function() { 
    return "welcome to delete link"; 
}); 
Route::patch('test', function() { return "welcome to patch link"; });


//if id exist or not exis display the page
Route::get('user/{id?}', function($id = null) { 
    return "welcome to user page id ".$id; 
});

//Regular expression for id to be only number 
//we can use where or use pattern function
Route::get('user/{id?}', function($id = null) { 
    return "welcome to user page id ".$id; 
})->where('id', '[0-9]+');
//patter function
Route::pattern('id', '[0-9]+');

Route::resource('users', 'Users'); //by default get Users controller with function index();
Route::resource('users', 'Users/create'); // Users controller with function create();
Route::resource('users', 'Users/{id}/edit'); // Users controller with function edit(); 
//Route::get('test', 'News2Controller');      
Route::post('test/1', function(Illuminate\Http\Request $request){
   return $request->all();
});   
    
Route::get('all/news', "News2Controller@index");   
   
Route::get('insert/news', "News2Controller@create");   
   
Route::get('insert/delete/{id?}', "News2Controller@destroy");   
   
 





