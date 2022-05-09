@extends('admin.template')
@section('adminsection')
<div class="container">
    <div style="padding: 10px 0px">
        <form action="" method="post">
            <div style="padding-bottom: 5px" class="row">
                <div class="col-6">
                    <label for="schoolList">Pilih Sekolah</label>
                    <select name="schoolFilter" id="schoolList" class="form-control" onchange="getData(this)">
                        <option value=""></option>
                        @foreach ($schools as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6">
                    <label for="kelasList">Pilih Kelas</label>
                    <select name="kelasFilter" id="kelasList" class="form-control">
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </form>
        <div>
            <button name="" id="" class="btn btn-secondary" href="#" role="button">Show All</button>
        </div>
    </div>
    <div  style="overflow:auto" class="row">
        @php
            $i = 1;
        @endphp
        <h2 style="text-align: center">Data Jawaban</h2>
        <table class="table">
            <thead style="vertical-align: baseline">
                <tr>
                    <th rowspan=2>Nama Lengkap</th>
                    <th rowspan=2>Sekolah</th>
                    <th rowspan=2>Kelas</th>
                    {{-- <th rowspan=2>Waktu Pengerjaan</th> --}}
                    @for ($idx = 1; $idx <= 11; $idx++)
                    <th colspan=5 style="text-align: center">Soal no {{$idx}}</th>
                    @endfor
                </tr>
                <tr style="text-align: center">
                    @for ($idx = 1; $idx <= 11; $idx++)
                    <th>Soal</th>
                    <th>Alasan</th>
                    <th>Degree</th>
                    <th>Kategori</th>
                    <th>Skor</th>
                        
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach ($answer as $row)
                <tr class="row-datas">
                    <td data-name="{{$row["nama_lengkap"]}}">
                        {{$row["nama_lengkap"]}}
                    </td>
                    <td data-school="{{$row["sekolah"]}}">
                        {{$row["sekolah"]}}
                    </td>
                    <td data-class="{{$row["kelas"]}}">
                        {{$row["kelas"]}}
                    </td>
                    {{-- <td>
                        {{$row["waktu"]}}
                    </td> --}}
                    @for ($idx = 1; $idx < 12; $idx++)
                        <td data-prob="{{$row["soal_".$idx]}}">
                            {{$row["soal_".$idx]}}
                        </td>
                        <td data-prob="{{$row["alasan_soal_".$idx]}}">
                            {{$row["alasan_soal_".$idx]}}
                        </td>
                        <td data-prob="{{$row["keyakinan_soal_".$idx]}}"> 
                            {{$row["keyakinan_soal_".$idx]}}
                        </td>
                        <td data-prob="{{$row["kategori_".$idx]}}">
                            {{$row["kategori_".$idx]}}
                        </td>
                        <td data-prob="{{$row["skor_".$idx]}}">
                            {{$row["skor_".$idx]}}
                        </td>
                    @endfor
                </tr>
                @php
                $i++;
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="/admin/export">
        <button type="button" class="btn btn-primary">Download Excel</button>
    </a>
    
</div>
@endsection