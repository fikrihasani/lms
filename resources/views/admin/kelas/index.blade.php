@extends('admin.template')
@section('adminsection')
<div class="container">
    <center><h1>Data Kelas</h1></center>
    @php
        $i = 1
    @endphp
    <div>
        <h2>Data Kelas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Sekolah</th>
                    <th colspan="3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $u)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->school->name}}</td>
                        <td>
                            <a href="/admin/kelas/{{$u->id_kelas}}"><button type="button" class="btn btn-primary">View</button></a>
                        </td>
                        <td>
                            <form action="/admin/kelas/{{$u->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            <form>
                        </td>
                        <td>
                            <a href="/admin/kelas/{{$u->id_kelas}}"><button type="button" class="btn btn-warning">Edit</button></a>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@endsection