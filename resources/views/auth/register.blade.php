@extends('template.layoutlog')
@section('content')
<div class="login-box" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
    <div class="login-logo">
        <a href="" class="text-white"><b>Sign Up</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign Up to start Shopping!</p>
            <form action="{{route('processregister')}}" method="post">
                @csrf
                <div class="input-group mb-3 mt-0">
                    <input type="text" class="form-control" placeholder="Name" name="name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3 mt-0">
                    <input type="text" class="form-control" placeholder="username" name="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('username')
                <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <p class="text-danger mb-2 mt-2 mt-0">{{ $message }}</p>
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
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="{{ url('auth/google') }}" class="btn btn-block btn-danger">
                    <i class="fab fa-google mr-2"></i> Sign Up using Google
                </a>
            </div>
            <!-- /.social-auth-links -->
            <center class="mb-0">
                Already have one? <a href="{{ route('login') }}" class="text-center">Login here!</a>
            </center>
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