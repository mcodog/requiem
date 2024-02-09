@extends('includes.layout')

@section('content')
<div class="container-lg m-5 p-3 d-flex justify-content-center flex-column align-items-md-center bg-light">
    <h4 class="p-2">You are in the Branch Page</h4>
    <form action="{{url('/branch/store')}}" method="POST">
        @csrf
        <label for="categoryId">Branch Head</label>
            <label for="artists" class="form-label">Pick An Branch Head</label>
                <select class="form-select" aria-label="Default select example" name="head">
                </div>
                <option selected>Open this select menu</option>
                @foreach ($head as $head)
                    <option value="{{ $head->id }}">{{ $head->lname." ".$head->fname }}</option>
                @endforeach
                </select> <br>
        <label for="description">Location</label>
        <input type="text" name="location"> <br>
        <input class="btn btn-primary" type="submit">
    </form>
</div>

@endsection