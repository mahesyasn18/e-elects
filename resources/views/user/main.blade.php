@extends('template.layoutuser')

@section('content')
<section class="content mb-5">
    <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{("img/a-banner (1).jpg")}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{("img/a-banner (2).jpg")}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{("img/a-banner (3).jpg")}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>All Product</h1>
            </div>
            <div class="col-sm-6">
                <a href="{{route("allproduct")}}" class="btn btn-info btn-sm float-right"><i class="fas fa-eye"> </i>
                    See More</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <a href="/keranjang" class="float-right btn btn-info mb-3 ml-2">
                <span class="rounded">
                    <i class="fas fa-shopping-cart"></i> Go To Cart
                    <span class="badge" style="background-color: rgb(0, 238, 255)">{{ $counts }}</span>
                </span>
            </a>
        </div>

        <div class="row">
            @foreach ($products as $item)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ asset("img/phone/".$item->file) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name." ".$item->color}}</h5>
                        <p class="card-text">Rp . {{ number_format($item->harga) }}</p>
                        <div class="row">
                            <div class="col-sm-9">
                                <a href="/detail/product/{{$item->id}}" class="btn btn-info mt-2"><i class="fas fa-eye">
                                    </i> Detail
                                    Product</a>
                            </div>
                            <div class="col-sm-3">
                                @if ($item->stok > 0)
                                <a href="/add/cart/{{ $item->id }}" class="btn btn-primary mt-2" id="btn-cart"><i
                                        class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                @else
                                <button href="/add/cart/{{ $item->id }}" class="btn btn-secondary mt-2" id="btn-cart"
                                    disabled>Sold</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection