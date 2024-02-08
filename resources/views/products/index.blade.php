@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    You are in the Products Page
    <table class="table table-striped table-hover">
    @foreach($products as $products)
    <tr>
        <td>{{$products->id}}</td>
        <td>{{$products->description}}</td>
        <td>{{$products->category_id}}</td>
        <td><a href="{{url('/products/'. $products->id.'/edit')}}"><i class="fas fa-edit"></i>Edit</a></td>
        <td><a href="{{url('/products/'. $products->id.'/delete')}}"><i class="fas fa-trash" style="color:red"></i>Delete</a></td>
    </tr>
    @endforeach
    </table>
    <div><a class="btn btn-primary " href="{{url('/products/create')}}" aria-disabled="true">Create Product</a></div>
</div>
@endsection