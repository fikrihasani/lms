<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use App\Models\AnswerSession;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    //
    public function index(){
        return view("index");
    }

    public function info(){
        return view("info");
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
        if (count($data) == 0) {
            # code...
            return "empty data";
        }else{
            return view("answer",['data'=>$data]);
            // print_r($data);
        }
    }

    public function result($id){
        $model = DB::table('answers')
        ->join('questions','answers.questions_id','=','questions.id')
        ->select('answers.*','questions.*')
        ->where('answers.answer_sessions_id','=',$id)->get();
        $dataDiri = Answer::where('answer_sessions_id','=',$id)->first();
        return view('result',['model'=>$model,'dataDiri'=>$dataDiri]);
    }

    public function answerStore(Request $request)
    {
        //
        if ($request->method()=="POST") {
            # code...
            $answerSes = new AnswerSession();
            $answerSes->save();
            $input = $request->all();
            $questionID = $request->questions_id; 
            // print($questionID);
            // print("<br>");
            $data = array();
            for ($i=1; $i < 3; $i++) { 
                # code...
                $tmp = array();
                $tmp["ansProb"] = $request["ansProb".$i];
                $tmp["ansReason"] = $request["ansReason".$i];
                $tmp["degreeBelieve"] = $request["degreeBelieve".$i];
                $tmp["questions_id"] = $request["questions_id".$i];
                $tmp["nama_lengkap"] = $request["nama_lengkap"];
                $tmp["sekolah"] = $request["sekolah"];
                $tmp["kelas"] = $request["kelas"];
                $tmp["answer_sessions_id"] = $answerSes->id;
                array_push($data,$tmp);
            }
            print_r($input);
            try {
                $res = Answer::insert($data);
                return redirect('/answer/result',$answerSes->id);
            } catch (\Throwable $th) {
                print('error insert');
                throw $th;
            }
        }
    }
}
