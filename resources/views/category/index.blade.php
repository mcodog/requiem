@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <table class="table table-striped table-hover text-center">
    <tr>
        <th>ID</th>
        <th>Description</th>
        <th>Image</th>
        <th>Controls</th>
    </tr>
    @foreach($categories as $categories)
    <tr>
        <td>{{$categories->id}}</td>
        <td>{{$categories->description}}</td>
        <td><img src="{{ $categories->getImage() }}" alt="Category" style="width:50px;"></td>
        <td><a href="{{url('/category/'. $categories->id.'/edit')}}"><i class="fas fa-edit"></i>Edit</a> | <a href="{{url('/category/'. $categories->id.'/delete')}}"  style="color:red"><i class="fas fa-trash"></i>Delete</a></td>
    </tr>
    @endforeach
    </table>
    <div><a class="btn btn-primary " href="{{url('/category/create')}}" aria-disabled="true">Create Category</a></div>
</div>
@endsection