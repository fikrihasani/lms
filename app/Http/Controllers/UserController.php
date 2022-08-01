<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index(){    
        $users = DB::table('users')->select('users.*','schools.id as id_sekolah','schools.name as nama_sekolah')->join('schools','users.schools_id','=','schools.id')->where('users.role','=',0)->get();
        // return dd($users);
        return view('admin.users.index',['users'=>$users]);
    }

    public function show($id){
        $data = DB::table('users')->select('users.*','schools.id as id_sekolah','kelas.name as nama_kelas','schools.name as nama_sekolah','kelas.id as id_kelas')->join('kelas','kelas.users_id','=','users.id')->join('schools','schools.id','=','users.schools_id')->where('users.id','=',$id)->where('users.role','=',0)->get();
        $user = $data->first();
        return view('admin.users.info',['data'=>$data,'user'=>$user]);
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.user.index',['user'=>$user]);
    }

    public function add(){
        return view('admin.user.add');
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
        return redirect('/admin/user/'.$user->id)->with('success','Pendaftaran akun berhasil. Silahkan login');
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->role = 0;
        $user->schools_id  = $request->school;
        $user->save();
    }
}
