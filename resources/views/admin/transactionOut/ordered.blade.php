@extends('template.layoutadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Users List</h1>
                <hr>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @include('admin.transactionOut.nav.navtransaction',["active" => "ordered"])
            </div>
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name User</th>
                            <th>Name Product</th>
                            <th>qty</th>
                            <th>Date Order</th>
                            <th>Total</th>
                            <th>Status</th>
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
                            <td>{{$item->created_at}}</td>
                            <td>{{"Rp. ".number_format($item->total)}}</td>
                            <td>{{$item->ispaid}}</td>
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