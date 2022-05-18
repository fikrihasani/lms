<?php

namespace App\Exports;

use App\Models\Answer;
use App\Models\AnswerSession;
use App\Models\School;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnswerRecapExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct(int $idKelas, int $isTeacher)
    {
        $this->idKelas = $idKelas;
        $this->isTeacher = $isTeacher;
    }

    public function view(): View
    {
        $answer = new Answer();
        // rekap all 
        $model = $answer->queryAnswerRecapCondition($this->idKelas);
        // get unique answer session data and convert to array
        $ansSes = AnswerSession::all()->toArray();
        // get answer data using answer session, all the formatting and calculation are being done  by answer class via recap answer method
        // facade pattern
        // echo $this->idKelas;
        $ansDat = $answer->recapAnswer($ansSes,$this->idKelas,$this->isTeacher);
        $schools = School::all();

        return view('admin.questions.recapExport',["answer"=>$ansDat, 'schools'=>$schools]);
    }
}
