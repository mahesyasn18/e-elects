@extends('template.layoutadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Admins List</h1>
                <hr>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        @if (Session::has("adminsuccess"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Success to create new admin
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(Session::has("updated"))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Success to updated admin
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(Session::has("blocked"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Success To Blocked Admin
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(Session::has("admin-unblock"))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Success To Unblocked Admin
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#modal-info">
            <i class="fas fa-plus"></i>
            <p class="d-inline">Add Admin</p>
        </button>
        <div class="modal fade" id="modal-info">
            <div class="modal-dialog">
                <div class="modal-content bg-info">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Add Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('createadmins')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                            </div>
                            @error('name')
                            <p class="text-danger mb-2">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username"
                                    name="username">
                            </div>
                            @error('username')
                            <p class="text-danger mb-2">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter password"
                                    name="password">
                            </div>
                            @error('password')
                            <p class="text-danger mb-2">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="status" value="admin">
                            <div class="from-group">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="show-password" id="show-password">
                                    <label for="show-password" id="password-label">Show Password</label>
                                </div>
                            </div>

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
                            <th>Name</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->username}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modal-primary{{$item->id}}"><i class="fas fa-edit"></i> Edit</a>
                                @if (Auth::guard("admin")->user()->id!=$item->id)
                                @if ($item->status=="admin")
                                <a href="" class="btn-sm btn btn-danger" data-toggle="modal"
                                    data-target="#modaldelete{{ $item->id }}"><i class="fas fa-lock"></i>Block</a>
                                @else
                                <form action="/admin/unblock/{{ $item->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method("PUT")
                                    <button type="submit" class="btn-sm btn btn-primary"><i class="fas fa-unlock"></i>
                                        Unblock</button>
                                </form>
                                @endif
                                @endif
                            </td>
                            <div class="modal fade" id="modal-primary{{$item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-primary">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Form Edit Admin</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/admin/update/{{$item->id}}" method="post">
                                                @csrf
                                                <input type="hidden" name="idadmin" value="{{$item->id}}">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" class="form-control" id="name"
                                                        placeholder="Enter Name" name="name" value="{{$item->name}}">
                                                </div>
                                                @error('category')
                                                <p class="text-danger mb-2">{{ $message }}</p>
                                                @enderror
                                                <div class="form-group">
                                                    <label for="username">Username</label>
                                                    <input type="text" class="form-control" id="username"
                                                        placeholder="Enter username" name="username"
                                                        value="{{$item->username}}">
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
                            <div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="/admin/block/{{ $item->id }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Yakin mau mem-block?</h3>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Nama : {{ $item->name }}<br>
                                                Username : {{ $item->username }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Block</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
<script>
    $("input[type='checkbox']").change(function(){
            if (this.checked) {
                $("#password").attr("type","text")
                $("#password-label").html("Hide Password")
            }
            else{
                $("#password").attr("type","password")
                $("#password-label").html("Show Password")
            }
        })
</script>

@endpush