@extends('admin.template')
@section('adminsection')
<div class="container">
    <h2>Data Pertanyaan</h2>
    <hr>
    <div id="questions" style="margin-bottom: 10px">
        <table class="table">
            <thead>
                <tr>
                    <th>Narasi Pertanyaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $q)
                <tr>
                    <td scope="row">{!!$q->narration!!}</td>
                    <td>
                        <button type="button" class="btn btn-info" onclick="location.href = '/admin/question/{{$q->id}}/edit'">Edit</button>
                        <button type="button" class="btn btn-info" onclick="location.href = '/admin/question/{{$q->id}}'">Show detail</button>
                    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $questions->links() }}
    </div>
</div>
   
@endsection
