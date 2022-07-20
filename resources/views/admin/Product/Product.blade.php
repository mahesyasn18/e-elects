@extends('template.layoutadmin')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product Dashboard</h1>
                <hr>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        @if (Session::has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Success to add a product
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(Session::has("updated"))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Success to updated a product
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(Session::has("deleted"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Success to deleted a product
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            @foreach ($products as $product)
            <div class="col-sm-3">
                <div class="card">
                    <img src="{{ asset("img/phone/".$product->file) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name." ".$product->color}}</h5>
                        <a href="/preview/specs/{{$product->id}}" class="btn btn-info mt-2">Details</a>
                        <a href="/edit/product/{{$product->id}}" class="btn btn-success mt-2">Edit</a>
                        <form action="/delete/product/{{ $product->id }}" method="post" class="d-inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger mt-2">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection