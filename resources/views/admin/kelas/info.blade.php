@extends('admin.template')
@section('adminsection')
<div class="container">
    <center><h1>Data Kelas {{$kelas->name}}</h1></center>
    @php
        $i = 1
    @endphp
    @if (Auth::user()->role == 1)
    @if (count($data) != 0)
    <div>
        <h2>Data Guru</h2>
        <div style="margin: 20px 0px">
            <button class="btn btn-primary" data-toggle="collapse" data-target="#formAddTeacher" aria-expanded="false" aria-controls="formAddTeacher">Tambah Guru</button>
         </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Sekolah</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $u)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$u->nama_guru}}</td>
                        <td>{{$u->nama_sekolah}}</td>
                        @if (Auth::user()->role == 1)
                        <td>
                            <button type="button" class="btn btn-primary">View</button>
                        </td>
                        <td>
                            <form action="/admin/kelas/delete/{{$u->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div style="margin: 20px 0px">
       <button class="btn btn-primary" data-toggle="collapse" data-target="#formAddTeacher" aria-expanded="false" aria-controls="formAddTeacher">Tambah Guru</button>
    </div>
    @endif
    <div class="collapse" id="formAddTeacher" style="margin-top: 20px; margin-bottom: 20px">
        <form action="/admin/kelas/addTeacher" method="post">
            @csrf
            <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
            <select name="users_id" id="" class="form-control" style="margin-bottom:5px">
                @foreach ($teacher as $t)
                    <option value="{{$t->id}}">{{$t->name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
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