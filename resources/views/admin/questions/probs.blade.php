@extends('admin.template')
@section('title')
    {{ "Daftar Pertanyaan"}}
@endsection
@section('adminsection')
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <h4 class="alert-heading">Selamat</h4>
  <p>{{session('success')}}</p>
</div>
@endif
    <div class="container" style="padding-top: 10px">
        <h2>Soal-soal pertanyaan tipe {{$questionType}}</h2>
        <div style="padding-top: 20px; padding-bottom: 20px">
            @php
            $i = 1;
        @endphp
        @foreach ($question as $q)
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="panelsStayOpen-heading{{$i}}">
                <button class="accordion-button @if($i!=1) collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-{{$i}}" aria-expanded="true" aria-controls="panelsStayOpen-{{$i}}">
                  Soal no {{$i}}
                </button>
              </h2>
              <div id="panelsStayOpen-{{$i}}" class="accordion-collapse collapse @if($i == 1) show @endif" aria-labelledby="panelsStayOpen-heading{{$i}}">
                <div class="accordion-body">
                    <div class="row">
                        <div class="row">
                            <p>
                                {!!$q->narration!!}
                            </p>
                        </div>
                        <div class="row">
                            <hr>
                            <b>Jawaban</b>
                            <div class="col-md-4 col-lg-4">
                                <p>A: {!!$q->answerA!!}</p>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p>B: {!!$q->answerB!!}</p>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <p>C: {!!$q->answerC!!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            <b>Alasan Jawaban</b>
                            <div class="col-md-4 col-lg-4">
                                A: {!!$q->answerReasonA!!}
                            </div>
                            <div class="col-md-4 col-lg-4">
                                B: {!!$q->answerReasonB!!}
                            </div>
                            <div class="col-md-4 col-lg-4">
                                C: {!!$q->answerReasonC!!}
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-md-6 col-lg-6">
                                <b>Jawaban Sebenarnya</b>
                                @switch($q->trueans)
                                    @case(1)
                                        <p>a</p>
                                        @break
                                    @case(2)
                                        <p>b</p>
                                        @break
                                    @case(3)
                                        <p>c</p>
                                        @break
                                    @default
                                        {{$q->trueAns}}
                                @endswitch
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <b>Jawaban Alasan Sebenarnya</b>
                                @switch($q->trueansReason)
                                    @case(1)
                                        <p>a</p>
                                        @break
                                    @case(2)
                                        <p>b</p>
                                        @break
                                    @case(3)
                                        <p>c</p>
                                        @break
                                    @default
                                        {{$q->trueAns}}
                                @endswitch
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-md-6 col-lg-6">
                                 <div class="alert alert-success" role="alert">
                                     <b>Feedback Jawaban Benar</b>
                                     <p>
                                         {!!$q->feedbackcorAns!!}
                                     </p>
                                 </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="alert alert-danger" role="alert">
                                    <b>Feedback Jawaban Salah</b>
                                    <p>
                                        {!!$q->feedbackincorAns!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-md-6 col-lg-6">
                                <div class="alert alert-success" role="alert">
                                    <b>Feedback Alasan Benar</b>
                                    <p>
                                        {!!$q->feedbackcorReason!!}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="alert alert-danger" role="alert">
                                    <b>Feedback Alasan Salah</b>
                                    <p>
                                        {!!$q->feedbackincorReason!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <a href="/admin/question/{{$q->id}}/edit">
                        <button type="button" class="btn btn-info">Edit Soal</button>
                    </a>  
                </div>
              </div>
            </div>
        </div>
        @php
            $i++;
        @endphp
        @endforeach
        </div>
    </div>
@endsection