@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4>You are in the Branch Page</h4>
    
    <div><a class="btn btn-primary " href="{{url('/branches/create')}}" aria-disabled="true">Create Branches</a></div>
</div>
@endsection