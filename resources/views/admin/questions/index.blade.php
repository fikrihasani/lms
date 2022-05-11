@extends('admin.template')
@section('adminsection')
<div class="container">
    <h2>Data Pertanyaan</h2>
    <hr>
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <h3>Pertanyaan Tipe A</h3>
            <button type="button" class="btn btn-info">Lihat Pertanyaan</button>
            <button type="button" class="btn btn-info">Edit Pertanyaan</button>
            <button type="button" class="btn btn-info"  @if (count($tipeA) > 0)
                disabled
            @endif>Buat Pertanyaan</button>
        </div>
        <div class="col-md-6 col-lg-6">
            <h3>Pertanyaan Tipe B</h3>
            <button type="button" class="btn btn-info">Lihat Pertanyaan</button>
            <button type="button" class="btn btn-info">Edit Pertanyaan</button>
            <button type="button" class="btn btn-info"  @if (count($tipeA) > 0)
                disabled
            @endif>Buat Pertanyaan</button>    
        </div>
    </div>
</div>
   
@endsection
