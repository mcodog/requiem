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
    <h4 class="p-2">Enter Product Details</h4>
    <form enctype="multipart/form-data" action="{{url('/products/store')}}" method="POST">
        @csrf
        <label for="categoryId">Category</label>
            <label for="artists" class="form-label">Pick An Category</label>
                <select class="form-select" aria-label="Default select example" name="categoryId">
                </div>
                <option selected>Open this select menu</option>
                @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->description }}</option>
                @endforeach
                </select> <br>
        <label for="description">Product Description</label>
        <input type="text" name="description"> <br>
        <label for="price">Price</label>
        <input type="text" name="price"> <br>
        <label for="description">Upload Icon</label>
        <input type="file" name="image"> <br>
        <input class="btn btn-primary" type="submit">
    </form>
</div>

@endsection