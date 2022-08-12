
@extends('template')
@section('title')
    {{ "Sistem Informasi Evaluasi Pembelajaran" }}
@endsection
@section('usersection')
        <div class="container">
            <div style="
            text-align: center;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 10px;">
                <h2>Selamat Datang di Sistem Informasi Evaluasi Pembelajaran</h2>
                <p>Silahkan klik tombol dibawah jika ingin memulai mengerjakan soal</p>
                <a href="/answer"><button type="button" class="btn btn-primary">Mulai</button></a>
            </div>
        </div>
@endsection
{{-- custom css cuma untuk halaman ini --}}
@section('css')

@endsection
{{-- custom js cuma untuk halaman ini --}}
@section('js')
    <script></script>
@endsection
