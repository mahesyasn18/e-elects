@extends('template.layoutuser')
@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1 class="m-0">My History</h1>
                <hr>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container">
        @if (Session::has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Order product successfully
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="card mt-3">
            <div class="card-header">
                @include('user.history.nav.navtransaction',["active" => "ordered"])
            </div>
            @if (count($transactions)==0)
            <p class="text-muted text-center">You Haven't made a transaction, <a href="{{route("addproduct")}}">Try
                    Now!</a>
            </p>
            @else
            @foreach ($transactions as $transaction)

            <div class="card-header">
                <div class="d-flex">
                    <p class="mb-0">Status :
                        {{ Str::ucfirst($transaction->tag->tag) }}
                        @if($transaction->tag_id==1)<span> (please make your
                            payment)</span>
                        @elseif($transaction->tag_id==2)<span> (Waiting confirmation from Admin)</span>
                        @elseif($transaction->tag_id==3)<span> (Processed Packing)</span>
                        @elseif($transaction->tag_id==4)<span> (Sent)</span>
                        @endif</p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @foreach ($transaction->products as $product)
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="{{ asset("img/phone/".$product->file) }}" class="img-fluid">
                            </div>
                            <div class="col-sm-6">
                                <h5 class="font-weight-bold">{{ $product->name }}</h5>
                                <p>Total Request : {{$product->pivot->qty}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <p class="mb-0"> Name : {{ $transaction->nama }}</p>
                        <p class="mb-0"> Phone : {{ "+62".$transaction->no_hp }}</p>
                        <p class="mb-0"> Address :
                            {{ $transaction->alamat." , ".$transaction->kecamatan." , ".$transaction->cities->city_name }}
                        </p>
                        <p class="mb-0"> Total : {{ "Rp. ".number_format($transaction->total) }}</p>
                        <p class="mb-0">Status Payment : {{ Str::ucfirst($transaction->ispaid) }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="/order/detail/{{ $transaction->id }}" class="btn btn-dark text-white" id="btn-tag">Detail</a>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</section>
@endsection