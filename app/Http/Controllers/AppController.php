<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\AnswerSession;
use App\Models\Kelas;
use App\Models\School;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    //
    public function index(){
        return view("index");
    }

    public function informasi(){
        return view("informasi");
    }
    public function getKelas($schools_id){
        $kelas = Kelas::where('schools_id','=',$schools_id)->get()->toArray();
        // return print_r($kelas);
        echo json_encode($kelas);
    }

    public function answer(){
        $qType = rand(1,2);
        if ($qType == 1) {
            $qType = 'A';
        }else {
            $qType = 'B';
        }
        $qType = 'A';

        $data = Question::where("questionType",$qType)->get();
        $schools = School::all();
        if (count($data) == 0) {
            return "empty data";
        }else{
            return view("answer",['data'=>$data,'schools'=>$schools]);
        }
    }

    public function result($id){
        $model = DB::table('answers')
        ->join('questions','answers.questions_id','=','questions.id')
        ->join('kelas','answers.kelas_id','=','kelas.id')
        ->select('answers.*','questions.*','kelas.name')
        ->where('answers.answer_sessions_id','=',$id)->get();
        $dataDiri = Answer::where('answer_sessions_id','=',$id)->first();
        return print_r($dataDiri);
        return view('result',['model'=>$model,'dataDiri'=>$dataDiri]);
    }

    public function answerStore(Request $request)
    {
        //
        // return $request->all();
        if ($request->method()=="POST") {
            # code...
            $answerSes = new AnswerSession();
            $answerSes->save();
            $input = $request->all();
            $questionID = $request->questions_id; 
            // print($questionID);
            // print("<br>");
            $data = array();
            for ($i=1; $i <=11; $i++) { 
                # code...
                $tmp = array();
                $tmp["ansProb"] = $request["ansProb".$i];
                $tmp["ansReason"] = $request["ansReason".$i];
                $tmp["degreeBelieve"] = $request["degreeBelieve".$i];
                $tmp["questions_id"] = $request["questions_id".$i];
                $tmp["nama_lengkap"] = $request["nama_lengkap"];
                $tmp["kelas_id"] = $request["kelas"];
                $tmp["answer_sessions_id"] = $answerSes->id;
                array_push($data,$tmp);
            }
            print_r($input);
            try {
                $res = Answer::insert($data);
                return redirect('/answer/result/'.$answerSes->id);
            } catch (\Throwable $th) {
                print('error insert');
                throw $th;
            }
        }
    }
}
