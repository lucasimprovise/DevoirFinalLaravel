<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Models\User as User;
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

// Les 4 premiers routes nous permettrons d'afficher nos pages 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');

});

Route::get('/', function () {
    return view('master');
});

Route::get('/inscription', function () {
    return view('inscription');
});

// Ceci est notre formulaire d'inscription

Route::post('/inscription', function () {
    request()->validate([
        'email' => ['required'],
        'password'=> ['required', 'confirmed', 'min:8'],
        'password_confirmation' => ['required'],
    ]);

    // Cette partie nous permet de créer le user et ensuite le stocker dans la bdd 

    $user = User::create([
        'email' => request('email'),
        'password' => bcrypt(request('password')),
        'name' => request('name'),
    ]);

    // Confirme que le user a bien été crée
    return "Your form is smitted " . request('email');
});

Route::get('index', function() {
    $users = User::all();

    return view('Users/index', [
    'users' => $users
    ]);
});

Route::get('/users', [UsersController::class,'index']);

Route::get('show/{id}', "\App\Http\Controllers\UsersController@show")->name('showUsers');

Route::post("/login",[UsersController::class,'login']);


// Nous permet de nous déconnecter
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});