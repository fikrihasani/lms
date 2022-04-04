<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnswerRecapExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $model = DB::table('answers')
        ->join('questions','answers.questions_id','=','questions.id')
        ->select('answers.*','questions.trueAns','questions.trueAnsReason')
        ->get();

        $answer = collect($this->calcArray($model));
        return $answer;
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Sekolah',
            'Kelas',
            'Jawaban Soal',
            'Jawaban Alasan',
            'Tingkat Keyakinan',
        ];
    }

    private function calcArray($model){
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
            $tmp["score"] = $this->calcScore(strtolower($tmp["soal"]),strtolower($tmp["alasan"]),strtolower($tmp["keyakinan"]));
            array_push($data,$tmp);
            $i++;
        }
        return $data;
    }

    private function calcScore($soal,$alasan,$keyakinan){
        if ($soal == "benar"){
            if($alasan == "benar"){
                if($keyakinan == "yakin"){
                    return 8;
                }else{
                    return 7;
                }
            }else{
                if($alasan == "yakin"){
                    return 4;
                }else{
                    return 3;
                }
            }
        }else{
            if ($alasan == "benar") {
                if ($keyakinan == "yakin") {
                    return 6;
                }else {
                    return 5;
                }
            }else{
                if($keyakinan == "yakin"){
                    return 2;
                }else {
                    return 1;
                }
            }
        }
    }
}
