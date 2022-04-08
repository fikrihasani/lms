@extends('admin.template')
@section('adminsection')
<div class="container">
    
    <form action="" method="post">
        @csrf
    </form>
    @if ($data)
    <table>
        
    </table>
    @foreach ($model as $school)
    
    @endforeach
    @else
        
    @endif
</div>
@endsection