@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4>You are in the Branch Page</h4>
    <table class="table table-striped table-hover">
    @foreach($branch as $branch)
    <tr>
        <td>{{$branch->id}}</td>
        <td>{{$branch->location}}</td>
        <td>{{$branch->fname." ".$branch->lname}}</td>
        <td>{{$branch->position}}</td>
        <td><a href="{{url('/branch/'. $branch->id.'/edit')}}"><i class="fas fa-edit"></i>Edit</a></td>
        <td><a href="{{url('/branch/'. $branch->id.'/delete')}}"><i class="fas fa-trash" style="color:red"></i>Delete</a></td>
    </tr>
    @endforeach
    </table>
    <div><a class="btn btn-primary " href="{{url('/branch/create')}}" aria-disabled="true">Create Branches</a></div>
</div>
@endsection