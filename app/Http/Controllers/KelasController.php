<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Answer;
use App\Models\AnswerSession;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;
use App\Http\Controllers\AdminController;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    //
    public function index(){
        return view('admin.kelas.index',['kelas'=>Kelas::all()]);
    }

    public function info($id){
        $data = DB::table('kelas')->select('kelas.*','users.name as nama_guru','users.id as id_guru','schools.name as nama_sekolah')->join('users','kelas.users_id','=','users.id')->join('schools','kelas.schools_id','=','schools.id')->where('kelas.id',$id)->get();
        $kelas = $data->first();
        $dataSiswa =  $this->groupByKelas($id);
        return view('admin.kelas.info',['kelas'=>$kelas,'data'=>$data,'dataSiswa'=>$dataSiswa]);
    }

    public function groupByKelas($idKelas){
        $answer = new Answer();
        // rekap all 
        $model = $answer->queryAnswerRecapCondition($idKelas);
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

    private function convert($data){
        $tmp = array();
        foreach ($data as $value) {
            # code...
            print($value->questions_id."<br>");
        }
        return collect($tmp);
    }

    public function delete($id){
        
    }
}
