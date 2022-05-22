<?php

use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/logins', function(){
    return Login::all();
});



Route::post('/logins', function(){

        request()->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
            

        ]);

    return Login::create([

        'first_name'=> request('first_name'),
        'last_name'=> request('last_name'),
        'email'=> request('email'),
        'password'=> request('password'),

    ]);
});

Route::put('/logins/{login}', function(Login $login){


      request()->validate([
        'first_name'=> 'required',
        'last_name'=> 'required',
        // 'email'=> 'required',
        'password'=> 'required',

    ]);

        $success=$login->update([
            'first_name'=> request('first_name'),
            'last_name'=> request('last_name'),
            'email'=> request('email'),
            'password'=> request('password'),


        ]);

        return[
            'success' =>$success
        ];

});

Route::delete('/logins/{login}', function(Login $login){

        $success = $login->delete();

        return[
            'success' => $success
        ];
});