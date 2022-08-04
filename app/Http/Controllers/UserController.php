<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\School;
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
        return view('admin.users.edit',['user'=>$user]);
    }

    public function add($idSekolah){
        $school = School::find($idSekolah);
        $kelas = Kelas::where('schools_id',$idSekolah)->get();
        return view('admin.users.add',['schools'=>$school,'kelas'=>$kelas]);
    }

    public function store(Request $request){
        return dd($request);
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
