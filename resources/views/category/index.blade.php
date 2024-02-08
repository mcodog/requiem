@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4>You are in the Categories Page</h4>
    <table class="table table-striped table-hover">
    @foreach($categories as $categories)
    <tr>
        <td>{{$categories->id}}</td>
        <td>{{$categories->description}}</td>
        <td><a href="{{url('/category/'. $categories->id.'/edit')}}"><i class="fas fa-edit"></i>Edit</a></td>
        <td><a href="{{url('/category/'. $categories->id.'/delete')}}"><i class="fas fa-trash" style="color:red"></i>Delete</a></td>
    </tr>
    @endforeach
    </table>
    <div><a class="btn btn-primary " href="{{url('/category/create')}}" aria-disabled="true">Create Category</a></div>
</div>
@endsection