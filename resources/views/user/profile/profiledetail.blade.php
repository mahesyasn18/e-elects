@extends('template.layoutuser')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="m-0">User's Details</h1>
                <hr>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-dark ">
            <div class="card-header">
                <h3 class="card-title">Contact Information</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        Name
                    </div>
                    <div class="col-sm-9">
                        {{$users->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Email
                    </div>
                    <div class="col-sm-9">
                        {{$users->email}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        Nomor Telp
                    </div>
                    <div class="col-sm-9">
                        088222112603
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Billing Address / Shipping Address</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p><b> Address</b></p>
                @if ($detail>"0")
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                {{$detail->user->name.", +(62) ".$detail->notelp}}
                                <br>
                                {{$detail->alamat.", ".$detail->kecamatan.", ".$detail->province->province.", ".$detail->cities->type." ".$detail->cities->city_name}}
                            </td>
                        </tr>
                    </tbody>
                </table>
                @else
                <p>
                    no address yet, add address </p>
                @endif
                @if (isset($detail))
                <button type="button" class="btn btn-secondary" data-toggle="modal"
                    data-target="#modaladdress{{$detail->id}}">
                    <i class="fas fa-edit"></i>
                    <p class="d-inline"> Update Address</p>
                </button>
                <div class="modal fade" id="modaladdress{{$detail->id}}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form action="/address/update/{{$detail->id}}" method="post">
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
                                            value="{{ $detail->alamat}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                                            placeholder="Subdistrct/Kecamatan" value="{{ $detail->kecamatan}}">
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">+62</span>
                                        </div>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                            aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ $detail->no_hp}}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="province">Enter Province</label>
                                        <select class="custom-select form-control-border" id="province" name="province">
                                            <option value="">Choose Province</option>
                                            @foreach ($province as $item)
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="Submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modaladdress">
                    <i class="fas fa-plus"></i>
                    <p class="d-inline"> Add Address</p>
                </button>
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
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                            aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ old("number") }}">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="province">Enter Province</label>
                                        <select class="custom-select form-control-border" id="province" name="province">
                                            <option value="">Choose Province</option>
                                            @foreach ($province as $item)
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
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="Submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

                <!-- /.modal-dialog -->
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    </div>
</section>
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
@endpush