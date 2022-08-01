@extends('admin.template')
@section('adminsection')
<div class="container">
    <center><h1>Data Guru</h1></center>
    @php
        $i = 1
    @endphp
    <div class="">
        <table class="table">
            <tr>
                <td>Nama: </td>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Sekolah: </td>
                <td>{{$user->nama_sekolah}}</td>
            </tr>
        </table>
    </div>
    <div>
        <h2>Data Kelas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th colspan = 2>Kelas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $u)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$u->nama_kelas}}</td>
                        <td><a href="/admin/kelas/{{$u->id_kelas}}"><button type="button" class="btn btn-primary">View</button></a></td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection