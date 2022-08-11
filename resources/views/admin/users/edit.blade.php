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
    <form action="/admin/users/{{$user->id}}" method="post" style="padding:20px">
        @csrf
        @method('PUT')
        <div style="margin-bottom:10px">
            <div class="form-floating" style="margin: 5px">
                <input type="text" name="name" id="name" required class="form-control @error('name') is-invalid @enderror" placeholder="your name" value="{{$user->name}}">
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label for="name">Nama</label>
            </div>
            <div class="form-floating" style="margin: 5px">
                <input type="email" name="email" id="email" required class="form-control @error('email') is-invalid @enderror" placeholder="email@domain.com" value="{{$user->email}}">
                @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <label for="email">Email</label>
            </div>
            <div class="form-floating" style="margin: 5px">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <label for="password">Password</label>
            </div>
            {{-- <div class="form-floating" style="margin: 5px">
                <select name="schools" id="kelas" class="form-control">
                    @foreach ($schools as $s)
                    <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
                <label for="school">Kelas</label>
            </div> --}}
            <div class="form-floating" style="margin: 5px">
                <p>Kelas</p>
                @foreach ($kelas as $k)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id={{"kelas".$k->kelasId}} name="{{"kelas".$k->kelasId}}" value="{{$k->kelasId}}">
                    <label class="form-check-label" for="{{"kelas".$k->kelasId}}">{{$k->kelasName}}</label>
                </div>
                @endforeach
            </div>
        </div>
        <div style="margin:5px">
            <button type="submit" class="btn btn-primary" style="float: right">Tambah</button>
        </div>
    </form>
</div>
@endsection