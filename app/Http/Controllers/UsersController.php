<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //
    public function index(){ //Bien mettre le chemin ver le fichier index
        $users = User::all(); //Methode pour récupérer tout les éléments
        return view('index',[ //metrre le chemin vers le fichier index
            'user'=>$users, //Appelle la table
        ]);}

    function login(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();

        if(!$user || !Hash::check($req->password,$user->password))
        {
            return "Username or password is not matched";
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/');
        }
    }
}