
@extends('template')
@section('usersection')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('register.store')}}" method="post" style="padding:20px">
            @csrf
            <div style="margin-bottom:10px">
                <div class="form-floating" style="margin: 5px">
                    <input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror" placeholder="your name" value="{{old('name')}}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating" style="margin: 5px">
                    <input type="email" name="email" id="email" required class="form-control @error('email') is-invalid @enderror" placeholder="email@domain.com" value="{{old('email')}}">
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
                <div class="form-floating" style="margin: 5px">
                    <select name="school" id="school" class="form-control">
                        @foreach ($schools as $school)
                        <option value="{{$school->id}}">{{$school->name}}</option>
                        @endforeach
                    </select>
                    <label for="school">School</label>
                </div>
            </div>
            <div style="margin:5px">
                <button type="submit" class="btn btn-primary" style="float: right">Registrasi</button>
            </div>
        </form>
    </div>
@endsection