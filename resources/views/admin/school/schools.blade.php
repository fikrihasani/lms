@extends('admin.template')
@section('title')
    {{ "School Data" }}
@endsection
@section('adminsection')
<div class="container">
    <div class="mb-5">
        <form action="{{route('admin.school.store')}}" method="post" id="form-school">
            @csrf
            <div class="mb-3">
                <label for="schoolName">Nama Sekolah</label>
                <input type="text" name="schoolName" id="schoolName" class="form-control">
            </div>
            <div class="mb-3">
                <label for="schoolName">Kelas</label>
                <input type="text" name="1" id="className1" class="form-control className">
            </div>
            <div id="school-buttons">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button class="btn btn-info" onclick="addKelasElement()" type="button">Tambah kelas</button>
            </div>
        </form>
    </div>
    @php
        $i = 1;
    @endphp
    @if ($data)
    <table class="table table-striped">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Sekolah</td>
                <td>Kelas</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($model as $school)
            <tr>
                <td>{{$i}}</td>
                <td>{{$school->name}}</td>
                <td>
                    @foreach ($school->kelas as $kelas)
                            {{$kelas->name}}
                    @endforeach
                </td>
                <td>
                    <a href="/admin/school/{{$school->id}}"><button class="btn btn-info">See</button></a>
                    <a href="/admin/school/{{$school->id}}/edit"><button class="btn btn-primary">Edit</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-warning" role="alert">
        <strong>Belum ada data</strong>
        <p>Silahkan tambahkan data pada form diatas</p>
    </div>
    
    @endif
</div>
@endsection