@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <table class="table table-striped table-hover text-center">
    <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Status</th>
        <th>Employee Class</th>
        <th>Position</th>
        <th>Location</th>
        <th>Controls</th>
    </tr>
    @foreach($employees as $employees)
    <tr>
        <td>{{$employees->id}}</td>
        <td>{{$employees->lname}}</td>
        <td>{{$employees->fname}}</td>
        <td>{{$employees->status}}</td>
        <td>{{$employees->class}}</td>
        <td>{{$employees->position}}</td>
        @if ($employees->location == null)
            <td>Not Assigned</td>
        @else
            <td>{{ $employees->location }}</td>
        @endif

        @if ($employees->img_path == null)
            <td><img src="{{URL::asset('img/employee/default-employee.png')}}" alt="Product" style="width:50px;"></td>
        @else
            <td><img src="{{url('storage/'. $employees->img_path )}}" alt="Product" style="width:50px;"></td>
        @endif
        
        <td><a href="{{url('/employees/'. $employees->id.'/edit')}}"><i class="fas fa-edit"></i>Edit</a> | <a href="{{url('/employees/'. $employees->id.'/delete')}}" style="color:red"><i class="fas fa-trash"></i>Delete</a></td>
    </tr>
    @endforeach
    </table>
    <div><a class="btn btn-primary " href="{{url('/employees/create')}}" aria-disabled="true">Create Employee</a></div>
</div>
@endsection