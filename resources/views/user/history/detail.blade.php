@extends('template.layoutuser')
@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12">
                <h1 class="m-0">My Order</h1>
                <hr>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h4>Customer Detail : </h4>
            <p class="mb-0">{{ $transactions->nama }}</p>
            <p class="mb-0">{{ "+62".$transactions->no_hp }}</p>
            <p class="mb-0">{{ $transactions->alamat }}</p>
            <p>{{ $transactions->kecamatan." , ".$transactions->cities->city_name }}</p>
        </div>
        <div class="col-sm-4">
            <h4>Items : </h4>
            <p class="mb-0">{{ count($transactions->products)." items" }}</p>
            <p class="mb-0">{{ "Total : Rp .".number_format($transactions->total) }}</p>
            <p>{{ "Ongkir : Rp .".number_format($transactions->ongkir) }}</p>
        </div>
        <div class="col-sm-4">
            <h4>Date : </h4>
            <p class="mb-0">{{ $transactions->created_at }}</p>
            <p class="mb-0">{{ $transactions->created_at->diffForHumans() }}</p>
            @if ($transactions->ispaid=="unpaid")
            @if (date("Y-m-d H:i:s")!=$transactions->expiry_date)
            <p>Expired in {{ $transactions->expiry_date }}</p>
            @else
            <p class="text-danger">Your order is expired , please make a new order</p>
            @endif
            @elseif($transactions->tag_id=="2")
            <p class="text-success">Your payment is checking by Admin , please wait</p>
            @elseif($transactions->tag_id=="3")
            <p class="text-success">Your Package is still Packing, Please Wait</p>
            @elseif($transactions->tag_id=="4")
            <p class="text-success">Your Package is On The Way</p>
            @else
            <p class="text-success">Your Package Has Arrive. Thank You ! :)</p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3>Items Detail</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10">
            @foreach ($transactions->products as $product)
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
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex justify-content-end">
                <a href="{{route("allproduct")}}" class="btn btn-dark mr-2"><i class="fa fa-arrow-circle-left"
                        aria-hidden="true"></i>
                    Back</a>
                @if ($transactions->ispaid=="unpaid")
                @if (date("Y-m-d H:i:s")!=$transactions->expiry_date)
                <a href="#" class="btn btn-dark" id="btn-pay" data-toggle="modal" data-target="#exampleModal">Pay
                    Now</a>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="/payment/confirmation" method="post">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><strong>Konfirmasi
                                            Pembayaran</strong>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{ asset("img/BCA.png") }}"
                                                                class="img-fluid bg-light">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <p style="font-size: 19px; letter-spacing: 2px;"
                                                                class="font-weight-bold mb-0">1299332223222</p>
                                                            <p>PT . Eelectrons tbk.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="https://firebasestorage.googleapis.com/v0/b/techstore-e47f8.appspot.com/o/image%2Fgopay.png?alt=media&token=1073055d-c037-4569-9c21-0e479c32f12f"
                                                                class="img-fluid bg-light">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <p style="font-size: 19px; letter-spacing: 2px;"
                                                                class="font-weight-bold mb-0">088222112603</p>
                                                            <p>Eelectrons</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{ asset("img/BRI.png") }}"
                                                                class="img-fluid bg-light">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <p style="font-size: 19px; letter-spacing: 2px;"
                                                                class="font-weight-bold mb-0">2517639827645</p>
                                                            <p>PT . electronics tbk.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{ asset("img/mandiri.png") }}"
                                                                class="img-fluid bg-light">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-12">
                                                            <p style="font-size: 19px; letter-spacing: 2px;"
                                                                class="font-weight-bold mb-0">9873526534728</p>
                                                            <p>Eelectronics</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="hidden" name="id" value="{{ $payment->id }}">
                                            <input type="hidden" name="id_transaction" value="{{ request()->id }}">
                                            <div class="form-group">
                                                <label for="rek">Rekening</label>
                                                <input type="number" name="rekening" id="rekening" class="form-control"
                                                    placeholder="" required>
                                                <small id="helpId" class="text-muted">Your account number</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="bank">Account Name</label>
                                                <input type="text" name="nama" id="nama" class="form-control"
                                                    placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="bank">Bank</label>
                                                <select name="bank" id="bank" class="form-control">
                                                    <option value="bca">Bank Central Asia (BCA)</option>
                                                    <option value="bni">Bank Negara Indonesia (BNI)</option>
                                                    <option value="mandiri">Bank Mandiri</option>
                                                    <option value="gopay">Gopay</option>
                                                </select>
                                                <small id="helpId" class="text-muted">Choose your bank</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="transfer">Tanggal Transfer</label>
                                                <input type="date" name="transfer" id="transfer" class="form-control"
                                                    placeholder="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="transfer">Jumlah Nominal</label>
                                                <input type="text" name="total" id="total" class="form-control"
                                                    value="{{$transactions->total }}" disabled>
                                            </div>
                                            <input type="hidden" name="totals" value="{{$transactions->total }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Confirmation</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @endif
                @elseif($transactions->tag_id==3)
                <a href="/print/invoice/{{ $transactions->id }}" class="btn btn-primary">Print/Download Invoice</a>
                @elseif($transactions->tag_id==4)
                <a href="/print/invoice/{{ $transactions->id }}" class="btn btn-primary">Print/Download Invoice</a>
                <a href="/process/completed/{{ $transactions->id }}" class="btn btn-success ml-2">Arrived</a>
                @elseif($transactions->tag_id==5)
                <a href="/print/invoice/{{ $transactions->id }}" class="btn btn-primary">Print/Download Invoice</a>
                @else

                @endif
            </div>
        </div>
    </div>
</div>

@endsection