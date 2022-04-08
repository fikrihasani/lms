@extends('admin.template')
@section('adminsection')
<div class="container">
    
    <form action="" method="post">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        
        <input type="text" name="schoolName" id="" class="form-control">
        <input type="text" name="className" id="" class="form-control">
    </form>
    @php
        $i = 1;
    @endphp
    @if ($data)
    <table>
        <th>
            <tr>
                <td>No</td>
                <td>Nama Sekolah</td>
                <td>Kelas</td>
                <td>Aksi</td>
            </tr>
        </th>
        <tbody>
            @foreach ($model as $school)
            <tr>
                <td>{{$i}}</td>
                <td>{{$name}}</td>
                <td>{{$kelas}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-warning" role="alert">
        <strong>Belum ada data</strong>
        <p>Silahkan tambahkan data pada form diatas</p>
    </div>
    
    @endif
</div>
@endsection