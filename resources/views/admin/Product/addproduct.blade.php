@extends('template.layoutadmin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add New product</h1>
                <hr>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Add New Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{route("createproduct")}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_admin" value="{{ Auth::guard('admin')->user()->id }}">
                <input type="hidden" name="name_admin" value="{{ Auth::guard('admin')->user()->name }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="Name_Product">Name Product</label>
                        <input type="text" class="form-control" id="Name_Product" placeholder="Enter Name Product"
                            name="name">
                    </div>
                    @error('name')
                    <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputstok">Stock</label>
                                <input type="number" class="form-control" id="inputstock"
                                    placeholder="Enter Stock Product" name="stok">
                            </div>
                            @error('stok')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputprice">Price</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Rp . </span>

                                    <input type="number" class="form-control d-inline" id="inputprice"
                                        placeholder="Enter Price Product" name="harga">
                                </div>
                            </div>
                            @error('harga')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <div class="select2-purple">
                            <select class="select2" multiple="multiple" data-placeholder="Select the category"
                                data-dropdown-css-class="select2-purple" style="width: 100%;" name="cat[]">
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('cat')
                        <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Product Picture</label>
                        <div class="input-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="{{ asset("img/phone.png") }}" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="file"
                                            onchange="previewImg()">
                                        <label class="custom-file-label" for="customFile"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @error('file')
                        <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-header">
                    <h3 class="card-title">Form Detail New Product</h3>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="color">Color</label>
                                <input type="text" class="form-control" id="color" placeholder="Enter Color Product"
                                    name="color">
                            </div>
                            @error('color')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Condition</label>
                                <select class="form-control select2bs4" style="width: 100%;" name="condition">
                                    <option value="" selected disabled hidden>Select Condition</option>
                                    <option value="New">New</option>
                                    <option value="Second">Second</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Announced">Announced</label>
                                <input type="text" class="form-control" id="Announced" placeholder="Enter Announced"
                                    name="Announced">
                            </div>
                            @error('announced')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="OS">OS</label>
                                <input type="text" class="form-control" id="inputprice"
                                    placeholder="Enter Price Product" name="OS">
                            </div>
                            @error('OS')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Weight">Weight</label>
                        <input type="number" class="form-control" id="Weight" placeholder="Enter Weight Product in Gram"
                            name="Weight">
                    </div>
                    @error('OS')
                    <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Display">Display</label>
                                <textarea id="summernotes" name="display">
                                    Place description about display here
                                </textarea>
                            </div>
                            @error('display')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Chipset">Chipset</label>
                                <textarea id="summernotes2" name="chipset">
                                    Place description about Chipset here
                                </textarea>
                            </div>
                            @error('chipset')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    @error('memory')
                    <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="camera">Camera</label>
                        <textarea id="summernotes3" name="camera">
                                    Place description about Main Camera here
                                </textarea>
                    </div>
                    @error('camera')
                    <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                    @enderror
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sensors">Sensors</label>
                                <textarea id="summernotes5" name="sensors">
                                    Place description about Sensors here
                                </textarea>
                            </div>
                            @error('sensors')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Battery">Battery</label>
                                <textarea id="summernotes6" name="battery">
                                    Place description about Battery here
                                </textarea>
                            </div>
                            @error('battery')
                            <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</section>
@endsection
@push('js')
<script>
    $('.select2').select2()
</script>
<script>
    $(function () {
      // Summernote
      $('#summernotes').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
<script>
    $(function () {
      // Summernote
      $('#summernotes2').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
<script>
    $(function () {
      // Summernote
      $('#summernotes3').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
<script>
    $(function () {
      // Summernote
      $('#summernotes4').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
<script>
    $(function () {
      // Summernote
      $('#summernotes5').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
<script>
    $(function () {
      // Summernote
      $('#summernotes6').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
</script>
<script src="{{asset("plugins/summernote/summernote-bs4.min.js")}}"></script>
<script>
    function previewImg() {
        const file = document.querySelector('#customFile');
        const fileLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        fileLabel.textContent = file.files[0].name;

        const filegambar = new FileReader();
        filegambar.readAsDataURL(file.files[0]);

        filegambar.onload = function(e){
            imgPreview.src = e.target.result;
        }
    }
</script>
@endpush