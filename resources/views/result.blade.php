
@extends('template')
@section('usersection')
        <div class="container">
            <div style="padding-bottom: 20px">
                <b>Data Diri: </b>
                <table>
                    <tr>
                      <td>Nama: </td>
                      <td>
                        {!!$dataDiri->nama_lengkap!!}
                      </td>
                    </tr>
                    <tr>
                      <td>Asal Sekolah:</td>
                      <td>
                        {!!$dataDiri->sekolah!!}
                      </td>
                    </tr>
                    <tr>
                      <td>Kelas: </td>
                      <td>
                        {!!$dataDiri->kelas!!}
                      </td>
                    </tr>
                </table>
            </div>
            @php
              $i = 1;                    
            @endphp
            @foreach ($model as $q)
              {{-- {!!-- <input type="hidden" name="{!!'questions_id'.$loop->iteration + $data->firstItem() - 1!!}" value="{!!$q->id!!}"> --!!} --}}
                <div>
                    <p><b>Soal no: {!! $i !!}</b></p>
                    <p>{!!$q->narration!!}</p>
                    <p>Jawaban Kamu: </p>
                    <p>
                    @switch($q->ansProb)
                        @case(1)
                            {!! $q->answerA !!}
                            @break
                        @case(2)
                            {!! $q->answerB !!}
                            @break
                        @case(3)
                            {!! $q->answerC !!}
                            @break
                        @default
                    @endswitch
                    </p>
                    <p>Jawaban Sebenarnya: </p>
                    <p>                    
                    @switch($q->trueans)
                        @case(1)
                            {!! $q->answerA !!}
                            @break
                        @case(2)
                            {!! $q->answerB !!}
                            @break
                        @case(3)
                            {!! $q->answerC !!}
                            @break
                        @default
                    @endswitch</p>
                    @if ($q->ansProb == $q->trueans)
                    <div class="alert alert-success" role="alert">
                        <strong>Jawaban kamu Benar!</strong>
                        <p>{!!$q->feedbackcorAns!!}</p>
                    </div>
                    @else
                    <div class="alert alert-warning" role="alert">
                        <strong>Jawaban kamu salah</strong>
                        <p>{!!$q->feedbackincorAns!!}</p>
                    </div>
                    @endif
                    <p>Alasan jawaban Kamu: </p>
                    <p>
                    @switch($q->ansReason)
                        @case(1)
                            {!! $q->answerReasonA !!}
                            @break
                        @case(2)
                            {!! $q->answerReasonB !!}
                            @break
                        @case(3)
                            {!! $q->answerReasonC !!}
                            @break
                        @default
                        @endswitch
                    </p>
                    <p>Alasan jawaban Sebenarnya: </p>
                    <p>
                    @switch($q->trueansReason)
                        @case(1)
                            {!! $q->answerReasonA !!}
                            @break
                        @case(2)
                            {!! $q->answerReasonB !!}
                            @break
                        @case(3)
                            {!! $q->answerReasonC !!}
                            @break
                        @default
                        @endswitch                   
                    </p>
                    @if ($q->ansReason == $q->trueansReason)
                    <div class="alert alert-success" role="alert">
                        <strong>Alasan kamu Benar!</strong>
                        <p>{!!$q->feedbackcorReason!!}</p>
                    </div>
                    @else
                    <div class="alert alert-warning" role="alert">
                        <strong>Jawaban kamu salah</strong>
                        <p>{!!$q->feedbackincorReason!!}</p>
                    </div>
                    @endif
                    <hr>
                    <p>Tingkat keyakinan jawaban dan alasan:</p>
                    <p>{!!$q->degreeBelieve!!}</p>
                </div>
                <br>
                @php
                    $i++;
                @endphp
            @endforeach
        </div>
        
@endsection

