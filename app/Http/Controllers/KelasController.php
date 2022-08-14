<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Answer;
use App\Models\AnswerSession;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;
use App\Http\Controllers\AdminController;
use App\Models\Question;
use App\Models\Teaching;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    //
    public function index(){
        return view('admin.kelas.index',['kelas'=>Kelas::all()]);
    }

    public function destroy(Kelas $kela){
        $deleted = Teaching::where('kelas_id',$kela->id)->delete();
        $answer = Answer::where('kelas_id',$kela->id)->groupBy('answer_sessions_id')->get();
        $ls = array();
        foreach ($answer as $ans) {
            array_push($ls,$ans->answer_sessions_id);
        }
        $answer = Answer::whereIn('answer_sessions_id',$ls)->delete();
        $answerSession = AnswerSession::whereIn('id',$ls)->delete();
        // return $id;
        //Cuma delete kelas kalau mau ditambah cek bisa di atas
        $kela->delete();
        return back();
    }

    public function info($id){
        $data = DB::table('teachings')->select('kelas.*','users.name as nama_guru','users.id as id_guru','schools.name as nama_sekolah')->join('kelas','kelas.id','=','teachings.kelas_id')->join('users','users.id','=','teachings.users_id')->join('schools','kelas.schools_id','=','schools.id')->where('teachings.kelas_id',$id)->get();
        $ls = array();
        foreach ($data as $d) {
            # code...
            array_push($ls,$d->id_guru);
        }
        $kelas = Kelas::find($id);
        $teacher = DB::table('users')->select('users.name','users.id')->join('schools','schools.id','=','users.schools_id')->whereNotIn('users.id',$ls)->get();
        // $teacher = User::where('role',0)->whereNotIn('id',$ls)->where()->get();
        $dataSiswa =  $this->groupByKelas($id);
        return view('admin.kelas.info',['kelas'=>$kelas,'data'=>$data,'dataSiswa'=>$dataSiswa,'teacher'=>$teacher]);
    }

    public function groupByKelas($idKelas){
        $answer = new Answer();
        // rekap all
        $model = $answer->queryAnswerRecapCondition($idKelas);
        if ($model->isEmpty()){
            return NULL;
        }
        // get unique answer session data and convert to array
        $ansSes = AnswerSession::all()->toArray();
        // get answer data using answer session, all the formatting and calculation are being done  by answer class via recap answer method
        // facade pattern
        // echo $this->idKelas;
        $ansDat = $answer->recapAnswer($ansSes,$idKelas,1);

        $finDat = array();
        for ($i=1; $i <=11 ; $i++) {
            # code...
            $finDat[$i] = array('A'=>array(),'B'=>array());
                # code...
                for ($j=ord('A'); $j <= ord('B') ; $j++) {
                    # code...
                    $finDat[$i][chr($j)]["Paham Konsep"] = array();
                    $finDat[$i][chr($j)]["Miskonsepsi (False Positive)"] = array();
                    $finDat[$i][chr($j)]["Miskonsepsi (False Negative)"] = array();
                    $finDat[$i][chr($j)]["Miskonsepsi Murni"] = array();
                    $finDat[$i][chr($j)]["Menebak dengan benar, kurang percaya diri"] = array();
                    $finDat[$i][chr($j)]["Kurang paham konsep"] = array();
                }
        }
        foreach ($ansDat as $x) {
            # code...
            if ($x['questionType'] == 'A') {
                $questionType = 'A';
            }else{
                $questionType = 'B';
            }
            for ($i=1; $i<=11 ; $i++) {
                # code...
                array_push($finDat[$i][$questionType][$x['kategori_'.$i]],$x['nama_lengkap']);
            }
        }
        return $finDat;
    }

    public function addTeacher(Request $request){
        $teaching = new Teaching();
        $teaching->kelas_id = $request->kelas_id;
        $teaching->users_id = $request->users_id;
        $teaching->save();
        return redirect('/admin/kelas/'.$request->kelas_id);
    }

    public function removeTeacher($id){
        // return $id;
        $deleted = Teaching::where('users_id',$id)->delete();
        return back();
    }

    public function delete($id){

    }
}
