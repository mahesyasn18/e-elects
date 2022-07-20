@extends('template.layoutlog')
@section('content')
<div class="login-box" data-aos="fade-up">
    <div class="login-logo">
        <a href="" class="text-white"><b>Create Username & Password</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Fill The Username & Password to start shopping</p>

            <form action="{{route("processpassword")}}" method="post">
                @csrf
                @if (Session::has("error"))
                <div class="alert alert-danger d-block w-100" role="alert">
                    <strong>{{ Session::get('error') }}</strong>
                </div>
                @endif
                <div class="input-group mb-3">
                    <input type="text" name="username" id="username" class="form-control">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <p class="text-danger mb-2">{{ $message }}</p>
                @enderror
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="show-password" id="show-password">
                            <label for="show-password" id="password-label">Show Password</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Continue</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
@push('js')
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