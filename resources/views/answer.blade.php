
@extends('template')
@section('title')
    {{ "Sistem Informasi Evaluasi Pembelajaran" }}
@endsection
@section('usersection')
        <div class="container">
          @if (count($data) == 0)
          <div style="
          text-align: center;
          position: absolute;
          left: 50%;
          top: 50%;
          transform: translate(-50%, -50%);
          padding: 10px;
          font-size:14pt">
              <i class="bi bi-emoji-frown-fill" style="color: yellow; font-size:25pt; margin-bottom:20px"></i> 
              <p>Belum ada soal. Silahkan kontak admin ke arizasafira@gmail.com</p>
          </div>
          @else
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
                <div style="float:right">
                  <ul class="pagination justify-content-center">
                      @for ($j = 1; $j <= 11; $j++)
                          <li class="page-item @if($j==1) active @endif"  onclick="toggleDivAns({{$j}},this.id,'pagination')" id="pageProbAns{{$j}}"><a class="page-link"> {{$j}}</a></li>
                      @endfor
                  </ul>
                </div>
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
                      <div style="float:right">
                        @if ($i != 1)
                        <button class="btn btn-primary" type="button" onclick="toggleDivAns({{$i-1}},this.id,'pagination')" id="pageProbAns{{$i-1}}">Soal Sebelumnya</button>
                        @endif
                        @if ($i == 11)
                        <button type="submit" class="btn btn-success">Kumpulkan Jawaban</button>
                        @else
                        <button class="btn btn-primary" type="button" onclick="toggleDivAns({{$i+1}},this.id,'pagination')" id="pageProbAns{{$i+1}}">Soal Selanjutnya</button>
                        @endif
                      </div>
                  </div>
                  @php
                      $i++;
                  @endphp
                  @endforeach
                  {{-- <div style="float:right">
                    <ul class="pagination justify-content-center">
                        @for ($j = 1; $j <= 11; $j++)
                            <li class="page-item"  onclick="toggleDivAns({{$j}},this.id,'pagination')" id="pageProbAns{{$j}}"><a class="page-link"> Soal {{$j}}</a></li>
                        @endfor
                    </ul>
                  </div>
                  <center>
                    <button type="submit" class="btn btn-primary">Kumpulkan Jawaban</button>
                  </center> --}}
              </form>
            </div>
          @endif
        </div>
@endsection
<script>

</script>

