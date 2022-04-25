
@extends('template')
@section('usersection')
        <div class="container">
            <form action="answerStore" method="post">
              @csrf
              <table>
                <tr>
                  <td>Nama: </td>
                  <td>
                    <input type="text" name="nama_lengkap" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td>Asal Sekolah: </td>
                  <td>
                    <input type="text" name="sekolah" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td>Kelas (contoh 6A atau VIA): </td>
                  <td>
                    <input type="text" name="kelas" class="form-control">
                  </td>
                </tr>
              </table>
              @php
              $i = 1;                    
              @endphp
              @foreach ($data as $q)
              {{-- <input type="hidden" name="{{'questions_id'.$loop->iteration + $data->firstItem() - 1}}" value="{{$q->id}}"> --}}
              <input type="hidden" name="{{'questions_id'.$i}}" value="{{$q->id}}">
                <div>
                    <p><b>Soal no: {{ $i }}</b></p>
                    <p>{!! $q->narration !!}</p>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="{{'ansProb'.$i}}" value="1">
                      <label class="form-check-label">
                      {{$q->answerA}}
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="{{'ansProb'.$i}}" value="2">
                      <label class="form-check-label">
                      {{$q->answerB}}
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="{{'ansProb'.$i}}" value="3">
                      <label class="form-check-label">
                      {{$q->answerC}}
                      </label>
                    </div>
                    <hr>
                    <p>Alasan:</p>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="{{"ansReason".$i}}" value="1">
                      <label class="form-check-label">
                      {{$q->answerReasonA}}
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="{{"ansReason".$i}}" value="2">
                      <label class="form-check-label">
                      {{$q->answerReasonB}}
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="{{"ansReason".$i}}" value="3">
                      <label class="form-check-label">
                      {{$q->answerReasonC}}
                      </label>
                    </div>
                    <hr>
                    <p>Tingkat keyakinan jawaban dan alasan:</p>
                    @for ($j = 0; $j < 6; $j++)
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="{{"degreeBelieve".$i}}" value="{{$j}}">
                      <label class="form-check-label">{{$j}}</label>
                    </div>
                    @endfor
                </div>
                <br>
                @php
                    $i++;
                @endphp
                @endforeach
                {{-- {{ $data->links() }} --}}
                <center>
                  <button type="submit" class="btn btn-primary">Kumpulkan Jawaban</button>
                </center>
            </form>
        </div>
        
@endsection

