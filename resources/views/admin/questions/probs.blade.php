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
    <div class="container">
        @php
            $i = 1;
        @endphp
        @foreach ($question as $q)
        <div class="row">
            <h3>Soal ke {{$i}}</h3>
            <div class="row">
                <p>
                    {!!$q->narration!!}
                </p>
            </div>
            <div class="row">
                <b>Jawaban</b>
                <div class="col-md-4 col-lg-4">
                    {!!$q->answerA!!}
                </div>
                <div class="col-md-4 col-lg-4">
                    {!!$q->answerB!!}
                </div>
                <div class="col-md-4 col-lg-4">
                    {!!$q->answerC!!}
                </div>
            </div>
            <div class="row">
                <b>Alasan Jawaban</b>
                <div class="col-md-4 col-lg-4">
                    {!!$q->answerReasonA!!}
                </div>
                <div class="col-md-4 col-lg-4">
                    {!!$q->answerReasonB!!}
                </div>
                <div class="col-md-4 col-lg-4">
                    {!!$q->answerReasonC!!}
                </div>
            </div>
            <div class="row">
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
                <div class="col-md-6 col-lg-6">
                    <b>Feedback Jawaban Benar</b>
                    <p>
                        {!!$q->feedbackcorAns!!}
                    </p>
                </div>
                <div class="col-md-6 col-lg-6">
                    <b>Feedback Jawaban Salah</b>
                    <p>
                        {!!$q->feedbackincorAns!!}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <b>Feedback Alasan Benar</b>
                    <p>
                        {!!$q->feedbackcorReason!!}
                    </p>
                </div>
                <div class="col-md-6 col-lg-6">
                    <b>Feedback Alasan Salah</b>
                    <p>
                        {!!$q->feedbackincorReason!!}
                    </p>
                </div>
            </div>
        </div> 
        <a href="/admin/question/{{$q->id}}/edit">
            <button type="button" class="btn btn-info">Edit Soal</button>
        </a>
        <hr>   
        @php
            $i++;
        @endphp
        @endforeach
    </div>
@endsection