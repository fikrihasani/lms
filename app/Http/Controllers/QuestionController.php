<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "a";
        // $questions = Question::where('questionType','=',$questionType)->paginate(1);
        // return view('admin.questions.index',['questions'=>$questions]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $datas = array();
        // for ($i=0; $i < 11; $i++) { 
        //     # code...
        //     array_push($datas, [
        //         "narration",
        //     ]);
        // }

        $questionA = Question::where('questionType','=','A')->get();
        $questionB = Question::where('questionType','=','B')->get();
        return view('admin.questions.create',['qACount'=>count($questionA),'qBCount'=>count($questionB)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ($request->method()=="POST") {
            # code...
            $input = $request->all();
            $questionType = $request->questionType; 
            $data = array();
            for ($i=1; $i <= 11; $i++) { 
                # code...
                $tmp = array();
                $tmp["narration"] = $request["narration".$i];
                $tmp["answerA"] = $request["answerA".$i];
                $tmp["answerB"] = $request["answerB".$i];
                $tmp["answerC"] = $request["answerC".$i];
                $tmp["answerReasonA"] = $request["answerA".$i];
                $tmp["answerReasonB"] = $request["answerB".$i];
                $tmp["answerReasonC"] = $request["answerC".$i];
                $tmp["feedbackcorAns"] = $request["feedbackcorAns".$i];
                $tmp["feedbackincorAns"] = $request["feedbackincorAns".$i];
                $tmp["feedbackcorReason"] = $request["feedbackcorReason".$i];
                $tmp["feedbackincorReason"] = $request["feedbackincorReason".$i];
                $tmp["questionType"] = $questionType;
                $tmp["trueans"] = $request["trueans".$i];
                $tmp["trueansReason"] = $request["trueansReason".$i];
                array_push($data,$tmp);
            }
            try {
                Question::insert($data);
                return redirect()->route('question.create')->with('success','Data Berhasil disimpan');
            } catch (\Throwable $th) {
                print('error insert');
                throw $th;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function probs($questionType)
    {
        //
        $question = Question::where('questionType','=',$questionType)->get();
        return view('admin.questions.probs',['question'=>$question,'questionType'=>$questionType]);
    }

    public function show($id)
    {
        //
        $question = Question::where('id','=',$id)->first();
        return view('admin.questions.show',['question'=>$question]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $question = Question::where('id','=',$id)->first();
        return view('admin.questions.edit',['question'=>$question]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $q = Question::find($id);
 
        $q->narration = $request->narration;
        $q->answerA = $request->answerA;
        $q->answerB = $request->answerB;
        $q->answerC = $request->answerC;
        $q->answerReasonA = $request->answerReasonA;
        $q->answerReasonB = $request->answerReasonB;
        $q->answerReasonC = $request->answerReasonC;
        $q->feedbackcorAns = $request->feedbackcorAns;
        $q->feedbackincorAns = $request->feedbackincorAns;
        $q->feedbackcorReason = $request->feedbackcorReason;
        $q->feedbackincorReason = $request->feedbackincorReason;
        $q->trueans  = $request->trueans;
        $q->trueansReason = $request->trueansReason;
        if ($q->save()) {
            return redirect('/admin/question/probs/'.$q->questionType)->with('success','Data Berhasil Diupdate');
        }else{
            return "error";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
