<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register(){
        $schools = School::all();
        return view('register',['schools'=>$schools]);
    }
    
    public function registerAdmin(){
        return view('registerAdmin');
    }
    
    public function storeAdmin(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email:dns',
            'password'=>'required|min:8'
        ]);
        
        $request->password = Hash::make($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->role = 1;
        $user->save();
        //     # code...
        // $request->session()->flash('success','Pendaftaran akun berhasil. Silahkan login');
        return redirect('login')->with('success','Pendaftaran akun berhasil. Silahkan login');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email:dns',
            'password'=>'required|min:8',
            // 'school' => 'required'
        ]);
        
        $request->password = Hash::make($request->password);

        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->role = 0;
        $user->schools_id  = $request->school;
        $user->save();
        //     # code...
        // $request->session()->flash('success','Pendaftaran akun berhasil. Silahkan login');
        return redirect('login')->with('success','Pendaftaran akun berhasil. Silahkan login');

    }
}
