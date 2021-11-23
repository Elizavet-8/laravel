<?php

use App\Models\Progress;
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
    $users = \App\Models\User::all();
//    $profile=\App\Models\ProfileResource::create([
//        'name'=>'Liza',
//        'json'=>json_encode([]),
//        'integer'=>0,
//        'boolean'=>true,
//    ]);


    $profiles = \App\Models\Profile::all();

    foreach($profiles as $profile){
        echo 'ProfileResource name: '.$profile['name'].'<br>';
        echo 'User: '.$profile->user['name'].'<br>';
        echo '------------------------------------------------------<br>';
    };


    $results = \App\Models\Results::all();

    foreach($results as $result){
        echo 'ProfileResource name: '.$result['name'].'<br>';
        echo '<b>ProfileResource\'progress: </b><br>' ;
        foreach ($result->result as $result){
            echo $result ['weight'].'<br>';
        };
        echo '------------------------------------------------------<br>';
    };

    return response()->json($results);
//    return view('welcome', compact('profile'));
//    return response()->json($profile);
});


Route::resource('profile', \App\Http\Controllers\ProfileController::class);
Route::resource('photos', \App\Http\Controllers\PhotoController::class);

