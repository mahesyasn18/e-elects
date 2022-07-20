@extends('template.layoutadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        @if (Session::has("created"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Success to add a category
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(Session::has("updated"))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Success to updated a category
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(Session::has("deleted"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Success to deleted a category
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#modal-info">
            <i class="fas fa-plus"></i>
            <p class="d-inline">Add Category</p>
        </button>
        <div class="modal fade" id="modal-info">
            <div class="modal-dialog">
                <div class="modal-content bg-info">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('processcategory')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name Category</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter category" name="category">
                            </div>
                            @error('category')
                            <p class="text-danger mb-2">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="card">
            <div class="card-body table-responsive">
                <table id="example1" class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $a)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$a->category}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal-primary{{$a->id}}"><i class="fas fa-edit"></i> Edit</a>
                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#modal-danger{{$a->id}}"><i class="fas fa-trash-alt"></i> Delete</a>
                            </td>
                            <div class="modal fade" id="modal-primary{{$a->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Form Edit Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/process-edit/category/{{$a->id}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name Category</label>
                                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter category" name="category"
                                                        value="{{$a->category}}">
                                                </div>
                                                @error('category')
                                                <p class="text-danger mb-2">{{ $message }}</p>
                                                @enderror
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-outline-light"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-outline-light">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <div class="modal fade" id="modal-danger{{$a->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Form Delete Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 align="center">Are you sure to delete category {{ $a->category }}
                                                <strong><span class="grt"></span></strong> ?</h5>
                                        </div>
                                        <form action="/process-delete/category/{{ $a->id }}" method="post"
                                            class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
            </div>
            </tr>
            @endforeach
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
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush