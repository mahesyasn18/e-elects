@extends('template.layoutuser')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class=" mb-2">
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-6">
                <a href="{{route("allproduct")}}" class="btn btn-success ml-3 mb-5">
                    <i class="fas fa-arrow-left">

                    </i>
                    <h6 class="d-inline"> Back</h6>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="/keranjang" class="float-right mr-3 mb-5">
                    <span class="bg-primary p-2 text-white rounded">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="badge" style="background-color: rgb(0, 238, 255)">{{ $count }}</span>
                    </span>
                </a>
            </div>
            <hr>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <img src="{{ asset("img/phone/".$product->file) }}" class="card-img-top" alt="...">
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <h3 class="m-0 ">{{$product->name ." ". $product->color}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mt-3">
                        <h3>Rp. {{number_format($product->harga, 0, ',', '.')}}</h3>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <a href="/add/cart/{{ $product->id }}" class="btn-sm btn btn-success float-right"><span><i
                                    class="fa fa-cart-plus" aria-hidden="true"></i> Add to
                                Cart</span></a>
                    </div>
                </div>
                <hr>
                <h2>Specifications</h2>
                <hr>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        Announced
                    </div>
                    <div class="col-sm-8">
                        {{$product->detail->announced}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        OS
                    </div>
                    <div class="col-sm-8">
                        {{$product->detail->OS}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Display
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->display !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Chipset
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->chipset !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Camera
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->camera !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Sensors
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->sensors !!}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        Battery
                    </div>
                    <div class="col-sm-8">
                        {!! $product->detail->battery !!}
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <h3><span><i class="fas fa-question-circle"></i></span> Discussion</h3>
                <hr>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-12">
                <form action="/create-question" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Ask Something...."
                            aria-label="Recipient's username" aria-describedby="button-addon2" name="question">
                        <div class="input-group-append">
                            <button class="btn btn-info text-light" type="submit" id="button-addon2">Ask</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-sm-12">
                @if (count($questions)==0)
                <p class="text-muted text-center">Nothing to show</p>
                @else
                <div id="diskusi">
                    @foreach ($questions as $question)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="d-flex justify-content-center" id="users-profile">
                                        <span style="font-size: 24px"><i class="fa fa-user-circle"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="col-sm-11">
                                    <h5 class="card-title mb-0">{{ $question->user->name }}</h5>
                                    <h6 class="text-muted mb-0 float-right">
                                        {{ " ".$question->created_at->diffForHumans() }}
                                    </h6>
                                    <br>
                                    <p style="font-size: 16px">{{ $question->body }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($answers as $answer)
                    @if ($answer->question_id==$question->id)
                    <div class="container">
                        <div class="card" id="answers-card">
                            <div class="card-body">
                                <div class="row justify-content-end">
                                    <div class="col-sm-1">
                                        <div class="d-flex justify-content-center" id="users-profile">
                                            <span style="font-size: 24px"><i class="fa fa-user-circle"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-11">
                                        <h5 class="card-title mb-0"><strong>Admin</strong><span> membalas</span></h5>
                                        <p class="text-muted mb-1 float-right">
                                            {{ $question->answers->created_at->diffForHumans() }}</p>
                                        <br>
                                        <p style="font-size: 16px">{{ $question->answers->body }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <h3>Recomended Product</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-sm-3">
                <div class="card">

                    <img src="{{ asset("img/phone/".$product->file) }}" class="card-img-top img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{ Str::limit($product->name, 30, '...') }}</strong></h5>
                        <p>Rp . {{ number_format($product->harga) }}</p>
                        <a href="/detail/product/{{ $product->id }}" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i> Detail</a>
                        <a href="/add/cart/{{ $product->id }}" class="btn btn-primary" id="btn btn-primary"><i
                                class="fa fa-cart-plus" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection