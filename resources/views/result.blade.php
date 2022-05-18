
@extends('template')
@section('title')
    {{ "Hasil Jawaban" }}
@endsection
@section('usersection')
        <div class="container">
            <div style="padding-bottom: 20px">
                <b>Data Diri: </b>
                <table class="table">
                    <tr>
                      <td>Nama: </td>
                      <td>
                        {!!$dataDiri->nama_lengkap!!}
                      </td>
                    </tr>
                    <tr>
                      <td>Asal Sekolah:</td>
                      <td>
                        {!!$dataDiri->nama_sekolah!!}
                      </td>
                    </tr>
                    <tr>
                      <td>Kelas: </td>
                      <td>
                        {!!$dataDiri->nama_kelas!!}
                      </td>
                    </tr>
                </table>
            </div>
            @php
              $i = 1;                    
            @endphp
            @foreach ($model as $q)
              {{-- {!!-- <input type="hidden" name="{!!'questions_id'.$loop->iteration + $data->firstItem() - 1!!}" value="{!!$q->id!!}"> --!!} --}}
                <div id="answerResult{{$i}}">
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
                @php
                    $i++;
                @endphp
            @endforeach
        </div>     
        <nav aria-label="Page navigation problem">
            <ul class="pagination justify-content-center"">
                @for ($i = 1; $i <= 11; $i++)
                    <li class="page-item"  onclick="toggleResAns({{$i}},this.id)" id="pageResAns{{$i}}"><a class="page-link">{{$i}}</a></li>
                @endfor
            </ul>
          </nav>
@endsection

