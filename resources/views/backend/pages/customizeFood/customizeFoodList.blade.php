@extends('backend.master')

@section('content')

<h1>Foods</h1>

<a href="{{route('admin.create.customize.food')}}" class="btn btn-success">Create Food</a>
<br>
<br>
<form action="{{ route('admin.customize.food.search') }}" method="GET" class="mb-3">
  <div class="input-group">
    <input type="text" name="search" class="form-control" placeholder="" value="{{ request()->search }}">
    <div class="input-group-append">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Event</th>
      <th scope="col">Price</th>
      <th>Action</th>
    </tr>
</thead>
<tbody>
@php
  $currentPage = $customizeFoods->currentPage();
  $perPage = $customizeFoods->perPage();
  $startId = ($currentPage - 1) * $perPage + 1;
  @endphp
@foreach($customizeFoods as $key => $data) 

<tr>
  <th scope="row">{{$startId + $key}}</th>
  <td>{{$data->name}}</td>
  <td>{{$data->event->name}}</td>
  <td>BDT.{{$data->price}} /-per person</td>

  <td>
    <a class="btn btn-info" href="{{route('admin.customize.food.edit' , $data->id)}}">Edit</a>
    <a class="btn btn-danger" href="{{route('admin.customize.food.delete' , $data->id)}}">Delete</a>
  </td>
</tr>
@endforeach
</tbody>
</table>
{{$customizeFoods->links()}}
@endsection