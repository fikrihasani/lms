@extends('admin.template')
@section('adminsection')
<div class="container">
    @php
        $i = 1;
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Sekolah</th>
                <th>Kelas</th>
                <th>Waktu</th>
                <th>Jawaban Soal</th>
                <th>Jawaban Alasan</th>
                <th>Keyakinan</th>
                <th>Kategori</th>
                <th>Skor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answer as $row)
            <tr>
                <td scope="row">
                    {{$i}}
                </td>
                <td>
                    {{$row["nama_lengkap"]}}
                </td>
                <td>
                    {{$row["sekolah"]}}
                </td>
                <td>
                    {{$row["kelas"]}}
                </td>
                <td>
                    {{$row["waktu"]}}
                </td>
                <td>
                    {{$row["soal"]}}
                </td>
                <td>
                    {{$row["alasan"]}}
                </td>
                <td>
                    {{$row["keyakinan"]}}
                </td>
                <td>
                    {{$row["kategori"]}}
                </td>
                <td>
                    {{$row["skor"]}}
                </td>
            </tr>
            @php
            $i++;
            @endphp
            @endforeach
        </tbody>
    </table>
    <a href="/admin/export">
        <button type="button" class="btn btn-primary">Download Excel</button>
    </a>
    
</div>
@endsection