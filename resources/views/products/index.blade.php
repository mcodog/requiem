@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <table class="table table-striped table-hover text-center">
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image</th>
        <th>Controls</th>
    </tr>
    @foreach($products as $products)
    <tr>
        <td>{{$products->id}}</td>
        <td>{{$products->product_name}}</td>
        <td>{{$products->price}}</td>
        <td>{{$products->category_desc}}</td>
        @if ($products->img_path == null)
            <td><img src="{{URL::asset('img/product/default-product.png')}}" alt="Product" style="width:50px;"></td>
        @else
            <td><img src="{{url('storage/'. $products->img_path)}}" alt="Product" style="width:50px;"></td>
        @endif
        <td><a href="{{url('/products/'. $products->id.'/edit')}}"><i class="fas fa-edit"></i>Edit</a> | <a href="{{url('/products/'. $products->id.'/delete')}}" style="color:red"><i class="fas fa-trash" ></i>Delete</a></td>
    </tr>
    @endforeach
    </table>
    <div><a class="btn btn-primary " href="{{url('/products/create')}}" aria-disabled="true">Create Product</a></div>
</div>
@endsection