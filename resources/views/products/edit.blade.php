@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4 class="p-2">You are in the Products Page</h4>
    <form action="{{url('/products/store')}}" method="POST">
        @csrf
        <label for="categoryId">Category</label>
            <label for="artists" class="form-label"></label>
                <select class="form-select" aria-label="Default select example" name="categoryId">
                </div>
                <option selectedvalue="{{ $product->category_id }}">{{ $category->description }}</option>
                @foreach ($categories as $categories)
                    <option value="{{ $categories->id }}">{{ $categories->description }}</option>
                @endforeach
                </select> <br>
        <label for="description">Product Description</label>
        <input type="text" name="description" value="{{$product->description}}"> <br>
        <label for="price">Price</label>
        <input type="text" name="price" value="{{$product->price}}"> <br>
        <input class="btn btn-primary" type="submit">
    </form>
</div>

@endsection