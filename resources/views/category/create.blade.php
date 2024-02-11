@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4 class="p-2">Enter Category Details</h4>
    <form enctype="multipart/form-data" action="{{url('/category/store')}}" method="POST">
        @csrf
        <label for="desc">Category Description</label>
        <input type="text" name="desc"> <br>
        <label for="description">Upload Icon</label>
        <input type="file" name="image"> <br>
        <input class="btn btn-primary" type="submit">
    </form>
</div>

@endsection