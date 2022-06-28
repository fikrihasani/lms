<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function index(){
        $teachers = User::where('role','=',0)->get();
        return view('admin.teacher.index',['teacher'=>$teachers]);
    }

    public function show($id){
        $teacher = User::find($id)->where('role','=',0);
        return view('admin.teacher.index',['teacher'=>$teacher]);
    }

    public function edit($id){

    }
}
