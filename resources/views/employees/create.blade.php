@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4 class="p-2">You are in the Employees Page</h4>
    <form action="{{url('/employees/store')}}" method="POST">
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
            <option selected>Open this select menu</option>
            @foreach ($class as $class)
                <option value="{{ $class->id }}">{{ $class->description }}</option>
            @endforeach
            </select> <br>

        <label for="empStatus" class="form-label">Status</label>
            <select class="form-select" aria-label="Default select example" name="empStatus">
            </div>
            <option selected>Open this select menu</option>
            @foreach ($status as $status)
                <option value="{{ $status->id }}">{{ $status->description }}</option>
            @endforeach
            </select> <br>

        <input class="btn btn-primary" type="submit">
    </form>
</div>

@endsection