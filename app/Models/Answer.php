<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class Answer extends Model
{
    use HasFactory;

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function session(){
        return $this->belongsTo(Session::class);
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

    private function convertToRecap(int $answerSessionId,array $dataCollection) : array{
        $tmp = array();
        if (count($dataCollection) == 0) {
            # code...
            return [[],[]];
        }
        $i = 0;
        $totalData = count($dataCollection);
        $prob = 1;
        while ($i < $totalData) {
            # code...
            if ($dataCollection[$i]["answer_sessions_id"] == $answerSessionId) {
                # code...
                $tmp["nama_lengkap"] = $dataCollection[$i]["nama_lengkap"];
                $tmp["kelas"] = $dataCollection[$i]["kelas"];
                $tmp["kelas_id"] = $dataCollection[$i]["kelas_id"];
                $tmp["sekolah"] = $dataCollection[$i]["sekolah"];
                $tmp["answer_sessions_id"] = $dataCollection[$i]["answer_sessions_id"];
                $tmp['questionType'] = $dataCollection[$i]['questionType'];
                while ($i < $totalData && $dataCollection[$i]["answer_sessions_id"] == $answerSessionId){
                    # code...
                    $tmp["soal_".$prob] = $dataCollection[$i]["soal"];
                    $tmp["alasan_soal_".$prob] = $dataCollection[$i]["alasan"];
                    $tmp["keyakinan_soal_".$prob] = $dataCollection[$i]["keyakinan"];
                    $tmp["kategori_".$prob] = $dataCollection[$i]["kategori"];
                    $tmp["skor_".$prob] = $dataCollection[$i]["skor"];
                    $tmp["waktu_".$prob] = $dataCollection[$i]["waktu"];
                    unset($dataCollection[$i]);
                    $i++;
                    $prob++;
                }
            }else{
                $i++;
            }
        }
        return [$tmp,array_values($dataCollection)];
    }
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

    private function convertAnswerData($model) : array{
        $data = array();
        $i = 1;
        foreach ($model as $ans) {
            # code...
            $tmp = array();
            $tmp["row"] = $i;
            $tmp["nama_lengkap"] = $ans->nama_lengkap;
            $tmp["sekolah"] = $ans->nama_sekolah;
            $tmp["kelas"] = $ans->nama_kelas;
            $tmp["kelas_id"] = $ans->kelas_id;
            $tmp["answer_sessions_id"] = $ans->answer_sessions_id;
            $tmp["waktu"] = date("d-m-Y", strtotime($ans->created_at));
            $tmp["soal"] = ($ans->ansProb == $ans->trueAns) ? "Benar" : "Salah";
            $tmp["alasan"] = ($ans->ansReason == $ans->trueAnsReason) ? "Benar" : "Salah";
            $tmp["keyakinan"] = ($ans->degreeBelieve <= 2) ? "Tidak Yakin" : "Yakin";
            $tmp["kategori"] = $this->getCategory($tmp["soal"],$tmp["alasan"],$tmp["keyakinan"]);
            $tmp["skor"] = $this->skorThreeTier($tmp["soal"],$tmp["alasan"],$tmp["keyakinan"]);
            $tmp['questionType'] = $ans->questionType;
            array_push($data,$tmp);
            $i++;
        }
        return $data;
    }

    public function queryAnswerRecapAll(){
        $model = DB::table('answers')
        ->join('questions','answers.questions_id','=','questions.id')
        ->join('kelas','answers.kelas_id','=','kelas.id')
        ->join('schools','kelas.schools_id','=','schools.id')
        ->join('answer_sessions','answers.answer_sessions_id','=','answer_sessions.id')
        ->select('answers.*','questions.trueAns','questions.trueAnsReason','questions.questionType','kelas.name as nama_kelas','schools.name as nama_sekolah','answer_sessions.created_at')
        ->get();
        return $model;
    }

    public function queryAnswerRecapCondition(int $kelasId){
        $model = DB::table('answers')
        ->join('questions','answers.questions_id','=','questions.id')
        ->join('kelas','answers.kelas_id','=','kelas.id')
        ->join('schools','kelas.schools_id','=','schools.id')
        ->join('answer_sessions','answers.answer_sessions_id','=','answer_sessions.id')
        ->select('answers.*','questions.trueAns','questions.trueAnsReason','questions.questionType','kelas.name as nama_kelas','schools.name as nama_sekolah','answer_sessions.created_at')
        ->where('answers.kelas_id','=',$kelasId)
        ->get();
        return $model;
    }

    public function recapAnswer(array $ansSes, int $idKelas, int $isTeacher){
        $model = collect(array());
        if ($isTeacher == 0) {
            if ($idKelas == -1) {
                $model = $this->queryAnswerRecapAll();
                # code...
            }else{
                $model = $this->queryAnswerRecapCondition($idKelas);
            }
        }else{
            $kelas = Kelas::where('schools_id','=',Auth::user()->schools_id)->get();
            // $tmp= $answer->queryAnswerRecapAll();
            // return $tmp;
            if ($idKelas == -1) {
                foreach ($kelas as $k) {
                    # code...
                    $tmp = $this->queryAnswerRecapCondition($k->id);
                    $model = $model->concat($tmp);
                }
                # code...
            }else{
                $model = $this->queryAnswerRecapCondition($idKelas);
            }
        }
        if($model->isEmpty()){
            return NULL;
        }        
        $data = $this->convertAnswerData($model);
        $recaps = array();
        $check = $this->convertToRecap($ansSes[0]["id"],$data);
        if (count($check[0]) > 0) {
            array_push($recaps,$check[0]);
        }
        // convert array to the needed array data format
        for($i = 1; $i<count($ansSes); $i++) {
            $check = $this->convertToRecap($ansSes[$i]["id"],$check[1]);
            if (count($check[0])>0) {
                array_push($recaps,$check[0]);
            }
        }
        return $recaps;
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
}
