@extends('template.layoutadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">History</h1>
                <hr>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6">
                        <h3>History Transaction</h3>
                    </div>
                    <div class="col-sm-6">
                        <a href="/eksport/excel/transaction" class="btn btn-primary float-right mt-2"><i
                                class="fas fa-file-excel"></i>
                            Download Report</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name User</th>
                            <th>Name Product</th>
                            <th>qty</th>
                            <th>Total</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user->name}}</td>
                            <td> @foreach ($item->products as $a)
                                @if ($a->id == $a->pivot->product_id)
                                <ul>
                                    <li>{{ $a->name." ".$a->color }}</li>
                                </ul>
                                @endif
                                @endforeach
                            </td>
                            <td>@foreach ($item->products as $a)
                                <center>
                                    <p>{{$a->pivot->qty}}</p>
                                </center>
                                @endforeach
                            </td>
                            <td>{{"Rp. ".number_format($item->total)}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="/print/inv/{{ $item->id }}" class="btn btn-primary btn-sm">
                                            Invoice</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-info{{$item->id}}">
                                            See Detail</a>
                                    </div>
                                </div>
                            </td>
                            <div class="modal fade" id="modal-info{{$item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-info">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Info Modal</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <h3>Data Transaction</h3>
                                            <hr>
                                            @foreach ($item->payment as $pay)
                                            @if ($pay->transaction_id==$item->id)
                                            <h6>Account Name : {{$pay->account_name}}</h6>
                                            <h6>Number Rekening :{{$pay->rekening}}</h6>
                                            <h6>Name Bank : {{$pay->bank}}</h6>
                                            <h6>Total : {{"Rp. ".number_format($pay->total)}}</h6>
                                            <h6>Payment Date : {{$pay->payment_date}}</h6>
                                            @endif
                                            @endforeach
                                        </div>

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-light"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')


<script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/jszip/jszip.min.js")}}"></script>
<script src="{{asset("plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{asset("plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{asset("plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>
<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@endpush