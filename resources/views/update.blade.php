
@extends('layouts.app')
@section('content')
 @include('Navbar.navbar')
<div class="container">
@foreach ($todos as $todo)
 <form action="{{route('todo.update',$todo->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
    <input type="text" class="" name="title" value="{{$todo->title}}">
    <input type="submit"  value="update">
    </div>
    </form>
    @endforeach
</div>
@endsection
