<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AnswerRecapExport;
use App\Models\AnswerSession;
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

    public function recapAns(){
        // get answer data 
        $answer = new Answer();
        // rekap all 
        $model = $answer->queryAnswerRecapAll();
        // get unique answer session data and convert to array
        $ansSes = AnswerSession::all()->toArray();
        // get answer data using answer session, all the formatting and calculation are being done  by answer class via recap answer method
        // facade pattern
        $ansDat = $answer->recapAnswer($ansSes,-1);
        $schools = School::all();
        return view('admin.recapAns',["answer"=>$ansDat, 'schools'=>$schools]);
    }
    
    public function export($idKelas){
        $kelas = DB::table('kelas')
        ->join('schools','kelas.schools_id','=','schools.id')
        ->select('kelas.name as nama_kelas','schools.name as nama_sekolah')
        ->where('kelas.id','=',$idKelas)
        ->first();
        return Excel::download(new AnswerRecapExport($idKelas), 'recap-'.$kelas->nama_kelas.'-'.$kelas->nama_sekolah.'.xlsx');
    }
}
