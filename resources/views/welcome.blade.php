@extends('layouts.app')
@section('content')
 @include('Navbar.navbar')
    <div class="container">

<ul class="list-group"></ul>
<form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <input type="text" class="" name="title" placeholder="Type here....">
    <input type="submit"  value="Add To Todo List">
  </div>
</form>
<ul class="list-group">

@foreach ($todos as $todo)
<div class="container">
    <div class="form-group">
    <ul class="list-group">

  <li class="list-group-item d-flex justify-content-between align-items-center">
    @if ($todo->completed==0)
    <span class="badge badge-danger badge-pill">Unmarked</span>
  @else
    <span class="badge badge-primary badge-pill">marked</span>
  @endif
    {{$todo->title}}

   <a href="{{route('todo.edit',$todo->id) }}"><input type="submit" value="Edit"></a>
   <form action="{{route('todo.destroy',$todo->id)}}" method="POST" enctype="multipart/form-data">
@csrf
    @method('DELETE')
    <div class="form-group">
    <input type="submit"  value="Delete">
    </div>
    </form>



    @if ($todo->completed==0)
         <form action="{{route('todo.update',$todo->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <input type="text" name="title" value="{{$todo->title}}" hidden>
    <input type="text" name="completed" value="1" hidden>
    <button type="submit" class="btn btn-success">Mark it as completed</button>
    </div>
    </form>
    @else
         <form action="{{route('todo.update',$todo->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <input type="text" name="title" value="{{$todo->title}}" hidden>
    <input type="text" name="completed" value="0" hidden>
    <button type="submit"class="btn btn-danger">Mark it as uncompleted</button>
    </div>
    </form>
    @endif
  </li>
</ul>
    </div>
</div>
    </div>
@endforeach
@endsection
