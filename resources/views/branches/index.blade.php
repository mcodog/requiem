@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <table class="table table-striped table-hover text-center">
    <tr>
        <th>ID</th>
        <th>Location</th>
        <th>Branch Head</th>
        <th>Position</th>
        <th>Controls</th>
    </tr>
    @foreach($branch as $branch)
    <tr>
        <td>{{$branch->id}}</td>
        <td>{{$branch->location}}</td>
        <td>{{$branch->fname." ".$branch->lname}}</td>
        <td>{{$branch->position}}</td>

    @if($branch->img_path == null)
        <td><img src="{{URL::asset('img/branch/default-branch.png')}}" style="width:50px;" alt="Branch"></td>
    @else
        <td><img src="{{url('storage/'.$branch->img_path)}}" style="width:50px;" alt="Branch"></td>
    @endif

        <td><a href="{{url('/branch/'. $branch->id.'/edit')}}"><i class="fas fa-edit"></i>Edit</a> | <a href="{{url('/branch/'. $branch->id.'/delete')}}" style="color:red"><i class="fas fa-trash" ></i>Delete</a></td>
    </tr>
    @endforeach
    </table>
    <div><a class="btn btn-primary " href="{{url('/branch/create')}}" aria-disabled="true">Create Branches</a></div>
</div>
@endsection