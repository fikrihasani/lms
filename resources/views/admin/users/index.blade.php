@extends('admin.template')
@section('adminsection')
<div class="container">
    <center><h1>Data Guru</h1></center>
    @php
        $i = 1
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Email Guru</th>
                <th>Sekolah Guru</th>
                <th colspan=2>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->nama_sekolah}}</td>
                    <td><a href="/admin/users/{{$u->id}}"><button type="button" class="btn btn-primary">View</button></a></td>
                    <td><a href="/admin/users/{{$u->id}}/edit"><button type="button" class="btn btn-primary">Edit</button></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection