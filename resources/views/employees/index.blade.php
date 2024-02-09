@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4>You are in the Employees Page</h4>
    <table class="table table-striped table-hover">
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
        
        <td><a href="{{url('/employees/'. $employees->id.'/edit')}}"><i class="fas fa-edit"></i>Edit</a></td>
        <td><a href="{{url('/employees/'. $employees->id.'/delete')}}"><i class="fas fa-trash" style="color:red"></i>Delete</a></td>
    </tr>
    @endforeach
    </table>
    <div><a class="btn btn-primary " href="{{url('/employees/create')}}" aria-disabled="true">Create Employee</a></div>
</div>
@endsection