@extends('includes.layout')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4 class="p-2">You are in the Employees Page</h4>
    <form enctype="multipart/form-data" action="{{url('/employees/store')}}" method="POST">
        @csrf
        <label for="lname">Last Name</label>
        <input type="text" name="lname">
        <label for="fname">First Name</label>
        <input type="text" name="fname"> <br>

        <label for="address">Address</label>
        <input type="text" name="address"> <br>

        <label for="age">Age</label>
        <input type="text" name="age"> <br>

        <label for="empPosition">Position</label>
        <input type="text" name="empPosition"> <br>

        <label for="empClass" class="form-label">Class</label>
            <select class="form-select" aria-label="Default select example" name="empClass">
            </div>
            @foreach ($class as $class)
                <option value="{{ $class->id }}">{{ $class->description }}</option>
            @endforeach
            </select> <br>

        <label for="empStatus" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="empStatus">
            </div>
            @foreach ($status as $status)
                <option value="{{ $status->id }}">{{ $status->description }}</option>
            @endforeach
            </select> <br>

        <label for="branch" class="form-label">Branch</label>
            <select class="form-select" aria-label="Default select example" name="branch">
            </div>
            <option selected>-- See Branch List --</option>
            @foreach ($branch as $branch)
                <option value="{{ $branch->id }}">{{ $branch->location }}</option>
            @endforeach
            </select> <br>

        <input type="file" name="image"> <br>

        <input class="btn btn-primary" type="submit">
    </form>
</div>

@endsection