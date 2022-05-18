@extends('admin.template')
@section('title')
    {{ "Admin Dashboard" }}
@endsection
@section('adminsection')
<div class="container">
    <div class="container">
        <div style="
        text-align: center;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        padding: 10px;">
            <h2>Halo {{Auth::user()->name}}<br>Selamat datang di Sistem Penilaian Nilai Siswa</h2>
            @if (Auth::user()->role == 1)
            <p>Silahkan klik salah satu tombol dibawah</p>
            <a href="/answer"><button type="button" class="btn btn-primary">Pertanyaan</button></a>
            <button type="button" class="btn btn-info" >Rekap Data</button>
            <button type="button" class="btn btn-info" >Data Guru</button>
            @endif
        </div>
    </div>
</div>
@endsection