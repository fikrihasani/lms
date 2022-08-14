<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\School;
use App\Models\Teaching;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class UserController extends Controller
{
    //
    public function index(){    
        $users = DB::table('users')->select('users.*','schools.id as id_sekolah','schools.name as nama_sekolah')->join('schools','users.schools_id','=','schools.id')->where('users.role','=',0)->get();
        // return dd($users);
        return view('admin.users.index',['users'=>$users]);
    }

    public function show($id){
        $data = DB::table('teachings')->select('users.*','kelas.name as nama_kelas','kelas.id as id_kelas', 'schools.name as nama_sekolah')->join('users','users.id','=','teachings.users_id')->join('kelas','kelas.id','=','teachings.kelas_id')->join('schools','schools.id','=','users.schools_id')->where('teachings.users_id','=',$id)->get();
        $user = $data->first();
        // return $data->name;
        return view('admin.users.info',['data'=>$data,'user'=>$user]);
    }

    public function edit($id){
        $user = User::find($id);
        $teaching = Teaching::where('users_id',$id)->get();
        $school = School::all();
        $arr = array();
        foreach ($teaching as $t) {
            # code...
            array_push($arr,$t->kelas_id);
        }
        // return dd($ar);
        $kelas = DB::table('kelas')->select('kelas.name as kelasName','kelas.id as kelasId', 'schools.id as schoolId', 'schools.name as schoolName')->join('schools','kelas.schools_id','=','schools.id')->join('users','schools.id','=','users.schools_id')->where('users.id',$id)->get();
        // return dd($kelas);
        return view('admin.users.edit',['user'=>$user,'kelas'=>$kelas,'schools'=>$school]);
    }

    public function add($idSekolah){
        $school = School::find($idSekolah);
        $kelas = Kelas::where('schools_id',$idSekolah)->get();
        return view('admin.users.add',['schools'=>$school,'kelas'=>$kelas]);
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

        return redirect('/admin/user/'.$user->id)->with('success','Pendaftaran akun berhasil. Silahkan login');
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        if(!is_null($request->password)){
            $user->password = $request->password;
        }
        $user->email = $request->email;
        $user->role = 0;
        // $user->schools_id  = $request->school;

        $rq =  $request->toArray();
        $data = Teaching::where('users_id',$id)->delete();
        foreach ($rq as $key => $value) {
            # code...
            if (str_contains($key,'kelas')) {
                // delete first
                // 
                $teach = new Teaching();
                $teach->kelas_id = $value;
                $teach->users_id = $id;
                $teach->save();
            }
        }
        // return dd($request);
        $user->save();
        return redirect('/admin/user/'.$user->id);

    }

    public function delete($id){
        $teachings = Teaching::where('users_id',$id)->delete();
        $users = User::find($id)->delete();
        return redirect('/admin/users');

    }
}
