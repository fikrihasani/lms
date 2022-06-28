<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    //

    public function index(){
        $modelSchool = School::all();
        $data = False;
        if (count($modelSchool)>0) {
            # code...
              $data = True;
        }
        return view('admin.school.schools',['data'=>$data,'model'=>$modelSchool]);
    }

    public function store(Request $request){
        
        $schools = new School();
        $schools->name = $request->schoolName;
        $schools->save();
        $data = $request->all();
        for ($i=1; $i <= count($data)-2; $i++) { 
            # code...
            $kelas = new Kelas();
            $kelas->name = $data[$i];
            $kelas->schools_id = $schools->id;
            $kelas->save();
        }
        return redirect(route('admin.school.index'));
    }

    public function edit($id){
        $school = School::find($id)->kelas();
        return dd($school);
        return view('admin.school.edit',['school'=>$school]);
    }

    public function show($id){
        $school = School::find($id);
        return view('admin.school.show',['school'=>$school]);
    }
}
