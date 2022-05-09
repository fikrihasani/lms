@extends('admin.template')
@section('adminsection')
<div class="container">
    <div style="padding: 10px 0px" class="row">
        <form action="" method="post">
            <label for="schoolList">Pilih Sekolah</label>
            <select name="schoolFilter" id="schoolList" class="form-control">
                @foreach ($schools as $s)
                <option value="{{$s->id}}">{{$s->name}}</option>
                @endforeach
            </select>
            <label for="kelasList">Pilih Kelas</label>
            <select name="kelasFilter" id="kelasList" class="form-control">
                <option value=""></option>
            </select>
        </form>
    </div>
    <div  style="overflow:auto" class="row">
        @php
            $i = 1;
        @endphp
        <table class="table">
            <thead style="vertical-align: baseline">
                <tr>
                    <th rowspan=2>No</th>
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
                <tr>
                    <td scope="row">
                        {{$i}}
                    </td>
                    <td>
                        {{$row["nama_lengkap"]}}
                    </td>
                    <td>
                        {{$row["sekolah"]}}
                    </td>
                    <td>
                        {{$row["kelas"]}}
                    </td>
                    {{-- <td>
                        {{$row["waktu"]}}
                    </td> --}}
                    @for ($idx = 1; $idx < 12; $idx++)
                        <td>
                            {{$row["soal_".$idx]}}
                        </td>
                        <td>
                            {{$row["alasan_soal_".$idx]}}
                        </td>
                        <td>
                            {{$row["keyakinan_soal_".$idx]}}
                        </td>
                        <td>
                            {{$row["kategori_".$idx]}}
                        </td>
                        <td>
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