@extends('admin.template')
@section('adminsection')
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
    <form action="{{route('admin.user.store')}}" method="post" style="padding:20px">
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
            <input type="hidden" name="school" value="{{$schools->id}}">
            <div class="form-floating" style="margin: 5px">
                <input type="text" disabled name="schoolShow" id="schoolShow" required class="form-control" value="{{$schools->name}}">
                <label for="school">Sekolah</label>
            </div>
            <div class="form-floating" style="margin: 5px">
                <select name="kelas" id="kelas" class="form-control">
                    @foreach ($kelas as $k)
                    <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                </select>
                <label for="school">Kelas</label>
            </div>
        </div>
        <div style="margin:5px">
            <button type="submit" class="btn btn-primary" style="float: right">Tambah</button>
        </div>
    </form>
</div>
@endsection