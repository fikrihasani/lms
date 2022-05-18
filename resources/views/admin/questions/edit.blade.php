@extends('admin.template')
@section('adminsection')

<div class="container">
    <div class="row" style="margin-bottom: 10px; margin-top: 10px">
        <h3>
            Soal ID = {{$question->id}}
        </h3>
    </div>
    <div class="row">
        <form action="/admin/question/{{$question->id}}" method="POST" id="FormUpdateQuestion">
            @csrf
            @method('PUT')
            @php
                $i = 1;
            @endphp
            <input type="hidden" name="questionType" value="{{$question->questionType}}">
            <div id="problems">
                <div class="row">
                    <div class="mb-3">
                        <label class="form-label">Narasi Pertanyaan</label>
                        <textarea name="narration" cols="50" rows="5" class="wysiwyg-editor form-control" id={{"question-editor-".$i}}>{!!$question->narration!!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jawaban A</label>
                        <textarea type="text" name="answerA" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"answerA-editor-".$i}}>{!!$question->answerA!!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jawaban B</label>
                        <textarea type="text" name="answerB" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"answerB-editor-".$i}}>{!!$question->answerB!!}</textarea>
                    </div>                
                    <div class="mb-3">
                        <label class="form-label">Jawaban C</label>
                        <textarea type="text" name="answerC" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"answerC-editor-".$i}}>{!!$question->answerC!!}</textarea>
                    </div>
                </div>
                <div class="row">
                    <p>Alasan: </p>
                    <div class="mb-3">
                        <label class="form-label">A: </label>
                        <textarea type="text" name="answerReasonA" class="wysiwyg-editor form-control" id={{"reasonA-editor-".$i}}>{!!$question->answerReasonA!!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">B: </label>
                        <textarea type="text" name="answerReasonB" class="wysiwyg-editor form-control" id={{"reasonB-editor-".$i}}>{!!$question->answerReasonB!!}</textarea>
                    </div>                
                    <div class="mb-3">
                        <label class="form-label">C: </label>
                        <textarea type="text" name="answerReasonC" class="wysiwyg-editor form-control" id={{"reasonC-editor-".$i}}>{!!$question->answerReasonC!!}</textarea>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jawaban Pertanyaan</label>
                    <select class="form-control" name="trueans">
                        <option value="1" @if ($question->trueans == 1)
                            selected="selected"
                        @endif>A</option>
                        <option value="2" @if ($question->trueans == 2)
                            selected="selected"
                        @endif>B</option>
                        <option value="3" @if ($question->trueans == 3)
                            selected="selected"
                        @endif>C</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jawaban Alasan</label>
                    <select class="form-control" name="trueansReason">
                        <option value="1" @if ($question->trueans == 1)
                            selected="selected"
                        @endif>A</option>
                        <option value="2" @if ($question->trueans == 2)
                            selected="selected"
                        @endif>B</option>
                        <option value="3" @if ($question->trueans == 3)
                            selected="selected"
                        @endif>C</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feedback Jawaban Benar</label>
                    <textarea name="feedbackcorAns" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"feedbackCor-editor-".$i}}>{!!$question->feedbackcorAns!!}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feedback Jawaban Salah</label>
                    <textarea name="feedbackincorAns" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"feedbackIncor-editor-".$i}}>{!!$question->feedbackincorAns!!}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feedback Alasan Benar</label>
                    <textarea name="feedbackcorReason" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"feedbackResCor-editor-".$i}}>{!!$question->feedbackcorReason!!}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feedback Alasan Salah</label>
                    <textarea name="feedbackincorReason" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"feedbackResIncor-editor-".$i}}>{!!$question->feedbackincorReason!!}</textarea>
                </div>
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection