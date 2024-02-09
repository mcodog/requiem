@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4 class="p-2">You are in the Employees Page</h4>
    <form action="{{url('/employees/'.$employee->id.'/update')}}" method="POST">
        @csrf
        <label for="lname">Last Name</label>
        <input type="text" name="lname" value="{{$employee->lname}}">
        <label for="fname">First Name</label>
        <input type="text" name="fname" value="{{$employee->fname}}"> <br>

        <label for="address">Address</label>
        <input type="text" name="address" value="{{$employee->address}}"> <br>

        <label for="age">Age</label>
        <input type="text" name="age" value="{{$employee->age}}"> <br>

        <label for="empPosition">Position</label>
        <input type="text" name="empPosition" value="{{$employee->position}}"> <br>

        <label for="empClass" class="form-label">Class</label>
            <select class="form-select" aria-label="Default select example" name="empClass">
            </div>
            <option value="{{$class->id}}" >{{ $class->description }}</option>
            @foreach ($classAll as $classAll)
                <option value="{{ $classAll->id }}">{{ $classAll->description }}</option>
            @endforeach
            </select> <br>

        <label for="empStatus" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="empStatus">
            </div>
            <option value="{{$status->id}}">{{$status->description}}</option>
            @foreach ($statusAll as $statusAll)
                <option value="{{ $statusAll->id }}">{{ $statusAll->description }}</option>
            @endforeach
            </select> <br>

        <label for="branch" class="form-label">Branch</label>
            <select class="form-select" aria-label="Default select example" name="branch">
            </div>
            @if (is_int($branch))
                <option selected value="0">Not Assigned</option>
            @else 
                <option value="{{ $branch->id }}">{{ $branch->location }}</option>
                <option value="0">Not Assigned</option>
            @endif
            @foreach ($branchAll as $branchAll)
                <option value="{{ $branchAll->id }}">{{ $branchAll->location }}</option>
            @endforeach
            </select> <br>

        <input class="btn btn-primary" type="submit">
    </form>
</div>

@endsection