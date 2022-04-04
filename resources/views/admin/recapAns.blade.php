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
                <th>Jawaban Soal</th>
                <th>Jawaban Alasan</th>
                <th>Keyakinan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answer as $row)
            <tr>
                <td scope="row">
                    {{$i}}
                </td>
                <td>
                    {{-- @if ($row->ansProb == $row->trueAns)
                        Benar
                    @else
                        Salah
                    @endif --}}
                    {{$row["soal"]}}
                </td>
                <td>
                    {{-- @if ($row->ansReason == $row->trueAnsReason)
                        Benar
                    @else
                        Salah
                    @endif --}}
                    {{$row["alasan"]}}
                </td>
                <td>
                        {{-- Tidak Yakin
                    @else
                        Yakin
                    @endif --}}
                    {{$row["keyakinan"]}}
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