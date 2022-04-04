
@extends('admin.template')
@section('adminsection')
    {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}
        <div class="container" style="padding:20px">
            <h2>Pertanyaan Soal Tipe A</h2>
            <form action="{{route('question.store')}}" method="post" id="Form1">
                @csrf
                <input type="hidden" name="questionType" value="A">
                @for ($i = 1; $i < 3; $i++)
                <div id="{{$i}}">
                    <p><b>Pertanyaan {{$i}}</b></p>
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label">Narasi Pertanyaan</label>
                            <textarea name="{{'narration'.$i}}" cols="50" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban A</label>
                            <input type="text" name="{{'answerA'.$i}}" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jawaban B</label>
                            <input type="text" name="{{'answerB'.$i}}" class="form-control" id="">
                        </div>                
                        <div class="mb-3">
                            <label class="form-label">Jawaban C</label>
                            <input type="text" name="{{'answerC'.$i}}" class="form-control" id="">
                        </div>
                    </div>
                    <div class="row">
                        <p>Alasan: </p>
                        <div class="mb-3">
                            <label class="form-label">A: </label>
                            <input type="text" name="{{'answerReasonA'.$i}}" class="form-control" id="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">B: </label>
                            <input type="text" name="{{'answerReasonB'.$i}}" class="form-control" id="">
                        </div>                
                        <div class="mb-3">
                            <label class="form-label">C: </label>
                            <input type="text" name="{{'answerReasonC'.$i}}" class="form-control" id="">
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
                        <textarea name="{{'feedbackcorAns'.$i}}" cols="50" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback Jawaban Salah</label>
                        <textarea name="{{'feedbackincorAns'.$i}}" cols="50" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback Alasan Benar</label>
                        <textarea name="{{'feedbackcorReason'.$i}}" cols="50" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Feedback Alasan Salah</label>
                        <textarea name="{{'feedbackincorReason'.$i}}" cols="50" rows="2" class="form-control"></textarea>
                    </div>
                </div>
                <hr>
                @endfor
                <button type="submit" form="Form1" value="Submit" class="btn btn-primary">Submit</button>
                {{-- <input type="button" value="submit" class="btn btn-primary"> --}}
            </form>
            {{-- <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav> --}}
        </div>
@endsection