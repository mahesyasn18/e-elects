@extends('template.layoutuser')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2 mt-5">
            <div class="col-sm-10">
                <h1 class="m-0">Product</h1>
                <hr>
            </div><!-- /.col -->
            <div class="col-sm-2">
                <a href="/keranjang" class="float-right btn btn-info mb-3 ml-2">
                    <span class="rounded">
                        <i class="fas fa-shopping-cart"></i> Go To Cart
                        <span class="badge" style="background-color: rgb(0, 238, 255)">{{ $counts }}</span>
                    </span>
                </a>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container">
        <div class="row mt-4 mb-3">
            <div class="col-lg-3 bg-dark mt-2" id="side-category">
                <div class="container mt-3">
                    <center>
                        <h4>Category</h4>
                    </center>
                    <br>
                </div>
                <ul class="nav flex-column" id="list-category">
                    <li class="nav-item">
                        <a href="{{route("allproduct")}}"
                            class="nav-link @if(!isset(request()->category)) active @endif text-white">All</a>
                    </li>
                    @foreach ($categories as $category)
                    @if (request()->category==$category->id)
                    <li class="nav-item">
                        <a class="nav-link active text-white"
                            href="?category={{ $category->id }}">{{ $category->category }}</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link text-secondary"
                            href="?category={{ $category->id }}">{{ $category->category }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="row" id="products">
                    @foreach ($products as $product)
                    <div class="col-6 col-md-3">
                        <div class="card-deck">
                            <div class="card m-2">
                                <img src="{{ asset("img/phone/".$product->file) }}" class="card-img-top img-thumbnail"
                                    alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>{{ Str::limit($product->name, 30, '...') }}</strong>
                                    </h5>
                                    <p class="card-text">Rp . {{ number_format($product->harga) }}</p>
                                    <a href="/detail/product/{{$product->id}}" class="btn btn-primary"><i
                                            class="fa fa-eye" aria-hidden="true"></i> Detail</a>
                                    @if ($product->stok > 0)
                                    <a href="/add/cart/{{ $product->id }}" class="btn btn-primary" id="btn-cart"><i
                                            class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                    @else
                                    <button href="/add/cart/{{ $product->id }}" class="btn btn-secondary" id="btn-cart"
                                        disabled>Sold</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    function collapse(){
            let category = document.querySelector("#list-category")
            category.classList.toggle("show")
        }
</script>
@endpush