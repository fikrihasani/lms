@extends('admin.template')
@section('title')
    {{ "School Data" }}
@endsection
@section('adminsection')
<div id="detailNomer" class="container">
    <h3>Nama Sekolah: {{$school->name}}</h3>
    <button class="btn btn-primary">Edit</button>
    <a href="/admin/users/add/{{$school->id}}"><button class="btn btn-primary">Tambah Guru</button></a>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#formAddKelas" aria-expanded="false" aria-controls="formAddKelas">Tambah Kelas</button>
    <div class="collapse" id="formAddKelas" style="margin-top: 20px; margin-bottom: 20px">
        <form action="/admin/school/addKelas/{{$school->id}}" method="post">
            @csrf
            <input type="text" name="kelasName" class="form-control"><br>
            <button type="submit" class="btn btn-success">Tambah</button>
        </form>
    </div>
    @php
        $i = 1;
    @endphp
    <table class="table table-striped">
        <thead>
            <tr>
                <td>No</td>
                <td>Kelas</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($school->kelas as $kelas)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$kelas->name}}</td>
                    <td>
                        <button type="button" class="btn btn-info" onclick="window.location.href='/admin/kelas/{{$kelas->id}}'">Show</button>
                        <button type="button" class="btn btn-info" onclick="window.location.href='/admin/kelas/{{$kelas->id}}/edit'">Edit</button>
                        {{-- <form action="/admin/kelas/{{$kelas->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        <form> --}}
                    </td>
                </tr>
            @php
                $i++;
            @endphp
            @endforeach
        </tbody>
    </table>
    @php
        $i = 1;
    @endphp     
    <table class="table table-striped">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Guru</td>
                <td>Email Guru</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($school->user as $guru)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$guru->name}}</td>
                    <td>{{$guru->email}}</td>
                    <td>
                        <button type="button" class="btn btn-info" onclick="window.location.href='/admin/users/{{$guru->id}}'">Show</button>
                    </td>
                </tr>
            @php
                $i++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection