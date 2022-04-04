<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnswerRecapExport;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.index');
    }

    public function recapAns(){
        $model = DB::table('answers')
        ->join('questions','answers.questions_id','=','questions.id')
        ->select('answers.*','questions.trueAns','questions.trueAnsReason')
        ->get();
        // $model = Answer::all();
        $data = array();
        $i = 1;
        foreach ($model as $ans) {
            # code...
            $tmp = array();
            $tmp["row"] = $i;
            $tmp["nama_lengkap"] = $ans->nama_lengkap;
            $tmp["sekolah"] = $ans->sekolah;
            $tmp["kelas"] = $ans->kelas;
            $tmp["soal"] = ($ans->ansProb == $ans->trueAns) ? "Benar" : "Salah";
            $tmp["alasan"] = ($ans->ansReason == $ans->trueAnsReason) ? "Benar" : "Salah";
            $tmp["keyakinan"] = ($ans->degreeBelieve <= 2) ? "Tidak Yakin" : "Yakin";
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
