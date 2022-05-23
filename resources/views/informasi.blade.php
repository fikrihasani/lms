
@extends('template')
@section('title')
    {{ "Sistem Informasi Evaluasi Pembelajaran" }}
@endsection
@section('usersection')
<div class="container" style="padding-top:20px; padding-bottom: 20px">
    <div class="row">
        <div class="col-lg-6" style="font-size:30pt; text-align: center"><i class="bi bi-info-circle"></i></div>
        <div class="col-lg-6">
            <p>Sistem Evaluasi Pembelajaran adalah sistem informasi berbasis web yang membantu guru untuk melihat pemahaman siswa terhadap materi pembelajaran</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6" style="font-size:30pt; text-align:center"><i class="bi bi-people-fill"></i></div>
        <div class="col-lg-6">
            <p>Pengguna yang dapat menggunakan sistem informasi ini adalah siswa sekolah dasar dan guru</p>
        </div>
    </div>
    <div class="row" id="FAQ">
        <div class="container">
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
</div>
@endsection