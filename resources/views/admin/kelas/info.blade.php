@extends('admin.template')
@section('adminsection')
<div class="container">
    <center><h1>Data Kelas {{$kelas->name}}</h1></center>
    @php
        $i = 1
    @endphp
    @if (Auth::user()->role == 1)
    <div>
        <h2>Data Guru</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Sekolah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $u)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$u->nama_guru}}</td>
                        <td>{{$u->nama_sekolah}}</td>
                        @if (Auth::user()->role == 1)
                        <td><button type="button" class="btn btn-primary">View</button></td>
                        @endif
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    
    <div>
        <h2>Data Jawaban</h2>
        @php
            $i = 1;
        @endphp
        <table class="table">
            <thead>
                <tr>
                    <th>Soal</th>
                    <th>Komponen</th>
                    <th>Jumlah Siswa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSiswa as $dat)
                    <tr>
                        <td rowspan="6">{{$i}}</td>
                        @foreach ($dat["A"] as $key => $value)
                        <td>{{$key}}</td>
                        <td>{{count($value)}}</td>
                    </tr>
                    @endforeach
                        {{-- <td>0</td> --}}
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>
@endsection