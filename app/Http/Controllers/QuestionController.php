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
        $tipeA = Question::where('questionType','=','A');
        $tipeB = Question::where('questionType','=','B');
        return view('admin.questions.index',['tipeA'=>$tipeA,'tipeB'=>$tipeB]);
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
        return view('admin.questions.create');

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
            print($questionType);
            print("<br>");
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
    public function show($id)
    {
        //
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
