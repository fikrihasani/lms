@extends('admin.template')
@section('title')
    {{ "Kelas Data" }}
@endsection
@section('adminsection')
<div class="container">
    <div class="">
        <p>Kelas: {{$kelas->name}}</p>
    </div>
    <div>
        <p>Sekolah: {{$kelas->school->name}}</p>
    </div>
    <div>
        <b>Data Jawaban</b>
        <div>
            @foreach ($answer as $item)
                <a href="">{{$item->nama_lengkap}}</a>
            @endforeach
        </div>
    </div>

</div>
@endsection