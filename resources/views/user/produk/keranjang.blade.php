@extends('template.layoutuser')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-5 mt-5">
            <div class="col-sm-12">
                <a href="{{route("allproduct")}}" class="btn btn-primary" style="font-style: 17px"><i
                        class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                    Back</a>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
    @if (Session::has("carts"))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Successfully added to cart
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has("address"))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        Successfully added address
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has("updateaddress"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Successfully updated address
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has("updated"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Successfully updated Cart
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @elseif (Session::has("deleted"))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Successfully deleted cart
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div><!-- /.container-fluid -->
<div class="container-fluid mt--8">
    <div class="row">
        <div class="col-sm-12">
            <div class="card rounded shadow-lg">
                <div class="card-header">
                    <h2>
                        Cart
                    </h2>
                </div>
                <div class="card-body">
                    @if (count($carts)==0)
                    <p class="text-muted text-center" style="font-size:19px">Shopping Cart Kosong !</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{route("allproduct")}}" class="btn btn-primary" style="font-size: 16px">Mulai
                            Belanja</a>
                    </div>
                    @else
                    <div class="row">
                        <div class="col-sm-8 mb-3">
                            <div class="row p-3 shadow rounded-lg">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-flex justify-content-between">
                                                <h4 class="mb-0">Alamat</h4>
                                                @if ($address==null)
                                                <a href="" class="btn-sm btn btn-primary text-light"
                                                    style="font-size: 16px" data-toggle="modal"
                                                    data-target="#modaladdress">
                                                    <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                                    Tambah Alamat
                                                </a>
                                                @endif
                                            </div>
                                            @if ($errors->any())
                                            <div class="alert alert-danger mt-2">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            @endif
                                            <hr>
                                        </div>
                                    </div>
                                    @if ($address!=null)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="d-flex justify-content-between">
                                                <p style="font-size: 17px" class="mb-0">{{ $address->alamat }} ,
                                                    {{ $address->kecamatan }} , {{ $address->cities->city_name }}</p>
                                                <div>
                                                    <a href="" class="btn-sm btn btn-success float-right mb-0"
                                                        style="font-size: 15px" data-toggle="modal"
                                                        data-target="#modaladdress{{$address->id}}"><i
                                                            class="fas fa-edit"></i>Edit</a>
                                                </div>
                                                <div class="modal fade" id="modaladdress{{$address->id}}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <form action="/address/update/{{$address->id}}" method="post">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        <strong>New Address</strong></h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="font-size: 16px">
                                                                    <div class="form-group">
                                                                        <input type="text" name="alamat" id="alamat"
                                                                            class="form-control"
                                                                            placeholder="example Jl.Ciwaruga No 01 RT 01 RW 04"
                                                                            value="{{ $address->alamat}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" name="kecamatan"
                                                                            id="kecamatan" class="form-control"
                                                                            placeholder="Subdistrct/Kecamatan"
                                                                            value="{{ $address->kecamatan}}">
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon1">+62</span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            name="phone" placeholder="Phone Number"
                                                                            aria-label="Username"
                                                                            aria-describedby="basic-addon1"
                                                                            value="{{ $address->no_hp}}">
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <label for="province">Enter Province</label>
                                                                        <select
                                                                            class="custom-select form-control-border"
                                                                            id="province" name="province">
                                                                            <option value="">Choose Province</option>
                                                                            @foreach ($provinces as $item)
                                                                            <option value="{{$item->id}}">
                                                                                {{$item->province}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mt-2">
                                                                        <label for="city">Enter City</label>
                                                                        <select
                                                                            class="custom-select form-control-border"
                                                                            id="city" name="city">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button type="Submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <p style="font-size:17px" class="mb-2">{{ "+62".$address->no_hp }}</p>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">

                                                    <input type="hidden" name="id_cities" id="id_cities"
                                                        value="{{ $address->id_cities }}">

                                                </div>
                                                <select name="kurir" id="kurir" class="form-control w-25">
                                                    <option disabled selected>-- Pilih Kurir --</option>
                                                    <option value="jne">JNE</option>
                                                    <option value="pos">POS</option>
                                                    <option value="tiki">TIKI</option>
                                                </select>
                                                <button class="btn btn-dark" type="submit" id="btn-checkout">Cek
                                                    Ongkir</button>
                                            </div>
                                            <div class="mb-3" id="table">

                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    @else
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="text-muted">Kamu belum punya alamat</p>
                                            <hr>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                @foreach ($carts as $cart)
                                                <div class="col-lg-3 col-sm-3 mt-2">
                                                    <img src="{{ asset("img/phone/".$cart->associatedModel) }}"
                                                        class="img-fluid img-thumbnail">
                                                </div>
                                                <div class="col-lg-9 col-sm-9 mt-2">
                                                    <h5><strong>{{ $cart->name }}</strong></h5>
                                                    <p>Stock of Product : {{$cart->attributes->stock}}</p>
                                                    <form action="/update/cart/{{ $cart->id }}" method="post"
                                                        class="form-inline mt-2">
                                                        @csrf
                                                        <div class="input-group">

                                                            <input type="number" name="quant[2]"
                                                                class="form-control input-number"
                                                                value="{{$cart->quantity}}" min="1"
                                                                max="{{$cart->attributes->stock}}">

                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary ml-3">Update</button>
                                                        <a href="/cart/delete/{{ $cart->id }}"
                                                            class="btn btn-danger ml-2">Delete Item</a>
                                                    </form>
                                                    <p class="mt-2" style="font-size: 17px" id="weight">Berat :
                                                        {{ $cart->attributes->weight*$cart->quantity."g" }}</p>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row p-3 bg-dark rounded shadow ml-1" id="cart-total">
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-between">
                                        <p><strong>Sub Total</strong></p>
                                        <p><strong>{{ "Rp ".number_format($subtotal) }}</strong></p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-between">
                                        <p><strong>Ongkir</strong></p>
                                        @if (!isset($ongkir))
                                        <p><strong>-</strong></p>
                                        @else
                                        <p><strong>{{ number_format($ongkir)."( ".Str::upper($kurir)." )"}}</strong></p>
                                        @endif
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-sm-12">
                                    <div class="d-flex justify-content-between">
                                        <h4>Total</h4>
                                        @if (!isset($ongkir))
                                        <h4>{{ "Rp ".number_format($subtotal) }}</h4>
                                        @else
                                        @php
                                        $total = $ongkir+$subtotal
                                        @endphp
                                        <p><strong>{{ "Rp ".number_format($total) }}</strong></p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    @if (!isset($ongkir))
                                    <p class="text-danger">Silahkan cek ongkir terlebih dahulu!</p>
                                    @else
                                    <form action="/checkout" method="post">
                                        @csrf
                                        <input type="hidden" name="ongkir" value="{{ $ongkir }}">
                                        <input type="hidden" name="total" value="{{ $total }}">
                                        <button type="submit" class="btn btn-primary float-center"
                                            id="btn-checkout">Checkout</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="modal fade" id="modaladdress" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form action="/address/create" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><strong>New Address</strong></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="font-size: 16px">
                                        <div class="form-group">
                                            <input type="text" name="alamat" id="alamat" class="form-control"
                                                placeholder="example Jl.Ciwaruga No 01 RT 01 RW 04"
                                                value="{{ old("alamat") }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                                                placeholder="Subdistrct/Kecamatan" value="{{ old("kecamatan") }}">
                                        </div>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">+62</span>
                                            </div>
                                            <input type="text" class="form-control" name="phone"
                                                placeholder="Phone Number" aria-label="Username"
                                                aria-describedby="basic-addon1" value="{{ old("number") }}">
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="province">Enter Province</label>
                                            <select class="custom-select form-control-border" id="province"
                                                name="province">
                                                <option value="">Choose Province</option>
                                                @foreach ($provinces as $item)
                                                <option value="{{$item->id}}">{{$item->province}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="city">Enter City</label>
                                            <select class="custom-select form-control-border" id="city" name="city">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="Submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="province"]').on('change', function () {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '/getCity/ajax/' + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="city"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="city"]').append(
                                '<option value="' +
                                value.id + '">' + value.type +' '+ value.city_name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="city"]').empty();
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#btn-checkout").on("click",function(){
            event.preventDefault()
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/cek_ongkir",
                data: {
                    "id" : $("#id_cities").val(),
                     "kurir" : $("#kurir").val()
                },
                dataType: "json",
                success: function (response) {
                    const data = response.data[0].costs;
                    $("#table").append(
                        `<table class="table">
                                <thead>
                                    <tr>
                                        <th>Layanan</th>
                                        <th>Biaya</th>
                                        <th>Estimasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="ongkir">
                                 </tbody>
                            </table>`
                    )
                    $("#ongkir").html("");
                    $.each(data, function (index,value) { 
                        $("#ongkir").append(
                        `  <tr>
                            <td>`+value.service+`</td>
                            <td>`+value.cost[0].value+`</td>
                            <td>`+value.cost[0].etd+`</td>
                            <td>
                         <form action="/keranjang" method="POST">
                            <input type="hidden" name="kurir" value="`+response.kurir+`"/>
                                            <input type="hidden" name="_token" value="`+$('meta[name="csrf-token"]').attr('content')+`"/>
                                            <input type="hidden" id="cost" name="cost" value="`+value.cost[0].value+`"/>
                                            <button class="btn btn-primary" id="btn-pilih" name="pilih" value="press">Pilih</button>
                                        </form>
                                    </td>
                                </tr>`
                        )
                    });
                }
            });
        })
    })
</script>
<script>
    $('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
@endpush