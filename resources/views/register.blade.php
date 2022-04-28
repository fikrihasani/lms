
@extends('template')
@section('usersection')
    <div class="container">
        <form action="route('authenticate')" method="post">
            @csrf
            <div style="margin-bottom:10px">
                <div class="">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required class="form-control @error('email') is-invalid @enderror" autofocus placeholder="email@domain.com" value="{{old('email')}}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required class="form-control">
                </div>
                <div class="">
                    <label for="school">School</label>
                    <select name="school" id="school" class="form-control">
                        @foreach ($schools as $school)
                            <option value="{{$school->id}}">{{$school->name}}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <button type="submit" class="btn btn-primary" style="float: right">Registrasi</button>
        </form>
        <p>Belum ada akun? 
            <a href="/register">Registrasi disini</a>
        </p>
    </div>
@endsection