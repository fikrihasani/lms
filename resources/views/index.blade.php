
@extends('template')
@section('usersection')
    {{-- <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}
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