
@extends('template')
@section('title')
    {{ "Sistem Informasi Evaluasi Pembelajaran" }}
@endsection
@section('usersection')
        <div class="container">
            <form action="answerStore" method="post">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <h3>Isilah Data diri dengan benar, agar memudahkan pendataan dan penghitungan hasil</h3>
                  <div class="alert alert-warning" role="alert">
                    <p>Jangan meninggalkan halaman pengerjaan jika tidak ingin data tidak tersimpan</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="md-3">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
                  </div>
                  <div class="md-3">
                    <label for="sekolah">Sekolah Asal</label>
                    <select name="sekolah" id="sekolahOption" class="form-control"  onchange="check(this.value)">
                      <option value="" id="" class="form-control" selected>Pilih Daftar Sekolah</option>
                      @foreach ($schools as $school)
                        <option value="{{$school->id}}" id="sekolah{{$school->id}}" class="form-control">{{$school->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="md-3">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelasOption" class="form-control">
                    </select>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                  @php
                  $i = 1;                    
                  @endphp
                  @foreach ($data as $q)
                  {{-- <input type="hidden" name="{{'questions_id'.$loop->iteration + $data->firstItem() - 1}}" value="{{$q->id}}"> --}}
                  <input type="hidden" name="{{'questions_id'.$i}}" value="{{$q->id}}">
                    <div id="{{'problemAns'.$i}}" style="margin-bottom: 30px">
                        <p><b>Soal no: {{ $i }}</b></p>
                        <p>{!! $q->narration !!}</p>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="{{'ansProb'.$i}}" value="1" checked>
                          <label class="form-check-label">
                          {!! $q->answerA !!}
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="{{'ansProb'.$i}}" value="2">
                          <label class="form-check-label">
                          {!! $q->answerB !!}
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="{{'ansProb'.$i}}" value="3">
                          <label class="form-check-label">
                          {!! $q->answerC !!}
                          </label>
                        </div>
                        <hr>
                        <p>Alasan:</p>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="{{"ansReason".$i}}" value="1" checked>
                          <label class="form-check-label">
                          {!! $q->answerReasonA !!}
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="{{"ansReason".$i}}" value="2">
                          <label class="form-check-label">
                          {!! $q->answerReasonB !!}
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="{{"ansReason".$i}}" value="3">
                          <label class="form-check-label">
                          {!! $q->answerReasonC !!}
                          </label>
                        </div>
                        <hr>
                        <p>Tingkat keyakinan jawaban dan alasan:</p>
                        @for ($j = 0; $j < 6; $j++)
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="{{"degreeBelieve".$i}}" value="{{$j}}" @if ($j == 5)
                            checked                          
                          @endif>
                          <label class="form-check-label">{{$j}}</label>
                        </div>
                        @endfor
                    </div>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                    <nav aria-label="Page navigation problem">
                      <ul class="pagination justify-content-center"">
                          @for ($i = 1; $i <= 11; $i++)
                              <li class="page-item"  onclick="toggleDivAns({{$i}},this.id)" id="pageProbAns{{$i}}"><a class="page-link">{{$i}}</a></li>
                          @endfor
                      </ul>
                    </nav>
                    <center>
                      <button type="submit" class="btn btn-primary">Kumpulkan Jawaban</button>
                    </center>
                </form>
              </div>
        </div>
@endsection
<script>

</script>

