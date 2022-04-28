
@extends('template')
@section('usersection')
        <div class="container">
            <div style="
            text-align: center;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;">
                <h2>Selamat Datang di Sistem Penilaian Nilai Siswa</h2>
                <p>Silahkan klik tombol dibawah jika ingin memulai mengerjakan soal</p>
                <a href="/answer"><button type="button" class="btn btn-primary">Mulai</button></a>
                <button type="button" class="btn btn-info" >Informasi</button>
            </div>
        </div>
@endsection