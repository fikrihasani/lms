<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use PDO;

class AuthController extends Controller
{
    //
    public function register(){
        $schools = School::all();
        return view('register',['schools'=>$schools]);
    }
    
    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);
        dd('berhasil masuk');

    }
    public function logout(){
    }
}
