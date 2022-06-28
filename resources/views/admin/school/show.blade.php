@extends('admin.template')
@section('title')
    {{ "School Data" }}
@endsection
@section('adminsection')
<div id="detailNomer" class="container">
    <h3>Nama Sekolah: {{$school->name}}</h3>
    <button class="btn btn-primary">Edit</button>
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
                        <button type="button" class="btn btn-info" onclick="window.location.href='/admin/teacher/{{$kelas->id}}'">Show</button>
                        <button type="button" class="btn btn-info" onclick="window.location.href='/admin/teacher/{{$kelas->id}}/edit'">Edit</button>
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