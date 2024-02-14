<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
</head>
<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
    <div class="container m-5 p2"><h3 class="">Transaction Beta</h3></div>
    

    <div class="container d-flex flex-wrap justify-content-center">
                @foreach($products as $products)
                <div class="card m-1 pt-4 d-inline-block border border-secondary" style="height:300px;width:220px;">
                    <div class="card-img-top d-flex flex-column align-items-center"><img src="{{ $products->getImage() }}" alt="Card image cap" style="width:50px;"></div>
                    
                    <div class="card-body bg-transparent border border-light">
                        <h5 class="card-title">{{ $products->description }}</h5>  
                        <p class="card-text"></p>
                        <input type="number" class="form-control" value="0" min="0" onkeydown="return false">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add to Cart</button >
                    </div>
                </div>
                @endforeach
            </div>
</body>
</html>