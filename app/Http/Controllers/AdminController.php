<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnswerRecapExport;
use Illuminate\Support\Collection;
use App\Models\School;
use App\Models\Kelas;
use phpDocumentor\Reflection\PseudoTypes\True_;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }

    private function getCategory($firstTier, $secondTier, $thirdTier) : String {
        if ($firstTier == "Benar" && $secondTier == "Benar" && $thirdTier == "Yakin") {
            # code...
            return  "Paham Konsep";
        }
        if ($firstTier == "Benar" && $secondTier == "Salah" && $thirdTier == "Yakin") {
            # code...
            return  "Miskonsepsi (False Positive)";
        }
        if ($firstTier == "Salah" && $secondTier == "Benar" && $thirdTier == "Yakin") {
            # code...
            return  "Miskonsepsi (False Negative)";
        }
        if ($firstTier == "Salah" && $secondTier == "Salah" && $thirdTier == "Yakin") {
            # code...
            return  "Miskonsepsi Murni";
        }
        if ($firstTier == "Benar" && $secondTier == "Benar" && $thirdTier == "Tidak Yakin") {
            # code...
            return  "Menebak dengan benar, kurang percaya diri";
        }
        if ($firstTier == "Benar" && $secondTier == "Salah" && $thirdTier == "Tidak Yakin") {
            # code...
            return  "Kurang paham konsep";
        }
        if ($firstTier == "Salah" && $secondTier == "Benar" && $thirdTier == "Tidak Yakin") {
            # code...
            return  "Kurang paham konsep";
        }
        if ($firstTier == "Salah" && $secondTier == "Salah" && $thirdTier == "Tidak Yakin") {
            # code...
            return  "Kurang paham konsep";
        }
        
    }

    // private function convertArray() : array{

    //     return ;
    // }
    private function skorThreeTier($firstTier, $secondTier, $thirdTier) : int{
        if ($firstTier == "Benar" && $secondTier == "Benar" && $thirdTier == "Yakin") {
            # code...
            return 8;
        }
        if ($firstTier == "Benar" && $secondTier == "Salah" && $thirdTier == "Yakin") {
            # code...
            return 7;
        }
        if ($firstTier == "Salah" && $secondTier == "Benar" && $thirdTier == "Yakin") {
            # code...
            return 6;
        }
        if ($firstTier == "Salah" && $secondTier == "Salah" && $thirdTier == "Yakin") {
            # code...
            return 5;
        }
        if ($firstTier == "Benar" && $secondTier == "Benar" && $thirdTier == "Tidak Yakin") {
            # code...
            return 4;
        }
        if ($firstTier == "Benar" && $secondTier == "Salah" && $thirdTier == "Tidak Yakin") {
            # code...
            return 3;
        }
        if ($firstTier == "Salah" && $secondTier == "Benar" && $thirdTier == "Tidak Yakin") {
            # code...
            return 2;
        }
        if ($firstTier == "Salah" && $secondTier == "Salah" && $thirdTier == "Tidak Yakin") {
            # code...
            return 1;
        }
    }

    public function recapAns(){
        $model = DB::table('answers')
        ->join('questions','answers.questions_id','=','questions.id')
        ->join('kelas','answers.kelas_id','=','kelas.id')
        ->join('schools','kelas.schools_id','=','schools.id')
        ->join('answer_sessions','answers.answer_sessions_id','=','answer_sessions.id')
        ->select('answers.*','questions.trueAns','questions.trueAnsReason','kelas.name as nama_kelas','schools.name as nama_sekolah','answer_sessions.created_at')
        ->get();
        // $model = Answer::all();
        $data = array();
        $i = 1;
        foreach ($model as $ans) {
            # code...
            $tmp = array();
            $tmp["row"] = $i;
            $tmp["nama_lengkap"] = $ans->nama_lengkap;
            $tmp["sekolah"] = $ans->nama_sekolah;
            $tmp["kelas"] = $ans->nama_kelas;
            $tmp["waktu"] = date("d-m-Y", strtotime($ans->created_at));
            $tmp["soal"] = ($ans->ansProb == $ans->trueAns) ? "Benar" : "Salah";
            $tmp["alasan"] = ($ans->ansReason == $ans->trueAnsReason) ? "Benar" : "Salah";
            $tmp["keyakinan"] = ($ans->degreeBelieve <= 2) ? "Tidak Yakin" : "Yakin";
            $tmp["kategori"] = $this->getCategory($tmp["soal"],$tmp["alasan"],$tmp["keyakinan"]);
            $tmp["skor"] = $this->skorThreeTier($tmp["soal"],$tmp["alasan"],$tmp["keyakinan"]);
            array_push($data,$tmp);
            $i++;
        }
        $answer = collect($data);
        return view('admin.recapAns',["answer"=>$answer]);
    }

    public function export(){
        return Excel::download(new AnswerRecapExport, 'recap.xlsx');
    }
}
