
@extends('admin.template')
@section('adminsection')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Congrats</h4>
          <p>{{session('success')}}</p>
        </div>
    @endif
    @if ($qBCount == 11 && $qACount == 11)
        <div class="container">
            <div style="
            text-align: center;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;">
                <h4>Semua Pertanyaan Sudah dibuat</h4>
                <br>
                <br>
                <a name="" id="" class="btn btn-info" href="/admin/question/probs/A" role="button">Cek Pertanyaan Tipe A</a>
                <a name="" id="" class="btn btn-info" href="/admin/question/probs/B" role="button">Cek Pertanyaan Tipe B</a>
            </div>
        </div>
    @else
        <div class="alert alert-info" role="alert">
            <h4>Untuk cara bagaimana membuat persamaan dengan latex</h4>
            <p>Silahkan cek pada link berikut: <a href="https://latex.codecogs.com/eqneditor/editor.php">referensi equation dengan latex</a></p>
        </div>
        
        <div class="container" style="padding:20px">
            <h2>Pertanyaan Soal Tipe A</h2>
            <form action="{{route('question.store')}}" method="post" id="Form1">
                @csrf
                <select name="questionType" id="">
                    @if ($qBCount == 11)
                    <option value="A">Tipe Pertanyaan A</option>
                    @else
                    <option value="B">Tipe Pertanyaan B</option>
                    @endif
                </select>
                @for ($i = 1; $i <= 11; $i++)
                <div id="{{'problem'.$i}}">
                    <p><b>Pertanyaan {{$i}}</b></p>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Narasi Pertanyaan</label>
                            <textarea name="{{'narration'.$i}}" cols="50" rows="5" class="wysiwyg-editor form-control" id={{"question-editor-".$i}}>Narasi soal {{$i}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban A</label>
                            <textarea type="text" name="{{'answerA'.$i}}" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"answerA-editor-".$i}}>Jawaban A</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban B</label>
                            <textarea type="text" name="{{'answerB'.$i}}" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"answerB-editor-".$i}}>Jawaban B</textarea>
                        </div>                
                        <div class="mb-3">
                            <label class="form-label">Jawaban C</label>
                            <textarea type="text" name="{{'answerC'.$i}}" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"answerC-editor-".$i}}>Jawaban C</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <p>Alasan: </p>
                        <div class="mb-3">
                            <label class="form-label">A: </label>
                            <textarea type="text" name="{{'answerReasonA'.$i}}" class="wysiwyg-editor form-control" id={{"reasonA-editor-".$i}}>Alasan jawaban A </textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">B: </label>
                            <textarea type="text" name="{{'answerReasonB'.$i}}" class="wysiwyg-editor form-control" id={{"reasonB-editor-".$i}}>Alasan jawaban B </textarea>
                        </div>                
                        <div class="mb-3">
                            <label class="form-label">C: </label>
                            <textarea type="text" name="{{'answerReasonC'.$i}}" class="wysiwyg-editor form-control" id={{"reasonC-editor-".$i}}>Alasan jawaban C </textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jawaban Pertanyaan</label>
                        <select class="form-control" name="{{'trueans'.$i}}">
                            <option value="1" selected="selected">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jawaban Alasan</label>
                        <select class="form-control" name="{{'trueansReason'.$i}}">
                            <option value="1" selected="selected">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback Jawaban Benar</label>
                        <textarea name="{{'feedbackcorAns'.$i}}" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"feedbackCor-editor-".$i}}>Feedback benar soal {{$i}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback Jawaban Salah</label>
                        <textarea name="{{'feedbackincorAns'.$i}}" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"feedbackIncor-editor-".$i}}>Feedback salah soal {{$i}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback Alasan Benar</label>
                        <textarea name="{{'feedbackcorReason'.$i}}" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"feedbackResCor-editor-".$i}}>Feedback alasan benar {{$i}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback Alasan Salah</label>
                        <textarea name="{{'feedbackincorReason'.$i}}" cols="50" rows="2" class="wysiwyg-editor form-control" id={{"feedbackResIncor-editor-".$i}}>Feedback alasan salah{{$i}}</textarea>
                    </div>
                </div>
                @endfor
                <nav aria-label="Page navigation problem">
                    <ul class="pagination justify-content-center">
                        @for ($i = 1; $i <= 11; $i++)
                            <li class="page-item"  onclick="toggleDiv({{$i}},this.id)" id="pageProb{{$i}}"><a class="page-link">{{$i}}</a></li>
                        @endfor
                    </ul>
                </nav>
                <button type="submit" form="Form1" value="Submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    @endif
@endsection