<?php

namespace App\Http\Controllers;
use App\Models\User as User;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class InscriptionsController extends Controller
{
    //Afficher la vue

    public  function inscription(){
        return view('inscription');
    }
//A partir d'un formulaire pour envoyer dans une base de donnée
public function inscriptions(){

   //Validation de formulaire  required = obligatoire, on peut mettre plusieurs validation à la suite
    request()->validate([
    'email' =>['required','email'],
    'password' =>['required','confirmed','min:8'],
    'password_confirmation' => ['required'],
    'name'=>['required'],
    ]);


    $user = User::create([ 
    'email' => request('email'),
    'password' => bcrypt(request('password')),  //Crypter mot de passe
    'name' => request('name'),
    ]);

    Mail::to($user->email)->send(new Register());
   //return "Your form is submitted";
    return "Your email is" . request('email');
}
}

