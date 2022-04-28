
@extends('template')
@section('usersection')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <form action="{{route('authenticate')}}" method="post">
                @csrf
                <div>
                    <div class="form-floating" style="margin: 5px">
                        <input type="text" name="email" id="email" required class="form-control @error('email') is-invalid @enderror" placeholder="email@domain.com" value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating" style="margin: 5px">
                        <input type="password" name="password" id="password" required class="form-control" placeholder="Password">
                        <label for="password">Password</label>
                    </div>
                </div>
                <div style="margin:5px">
                    <button type="submit" class="btn btn-primary" style="float: right">Login</button>
                    <p>Belum ada akun? 
                        <a href="/register">Registrasi disini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection