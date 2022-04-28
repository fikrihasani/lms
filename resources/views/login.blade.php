
@extends('template')
@section('usersection')
    <div class="container">
        <form action="route('authenticate')" method="post">
            @csrf
            <div class="form-floating">
                <input type="text" name="email" id="email" required class="form-control @error('email') is-invalid @enderror" autofocus placeholder="email@domain.com" value="{{old('email')}}">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" id="password" required class="form-control">
            </div>
                
            <button type="submit">Login</button>
        </form>
        <p>Belum ada akun? 
            <a href="/register">Registrasi disini</a>
        </p>
    </div>
@endsection