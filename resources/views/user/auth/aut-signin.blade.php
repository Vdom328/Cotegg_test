@extends('user.auth.layout.master')
@section('title')
Login
@endsection
@section('css')
    <style>
        .color{
            color: #7de766
        }
    </style>
@endsection

@section('content')
    <!--================================-->
    <!-- Page Content Start -->
    <!--================================-->
    <div class="ht-100v text-center">
        <div class="row no-gutters pd-0 mg-0">
            <div class="col-lg-4 bg-gray-100">
                <div class="ht-100v d-flex align-items-center justify-content-center">
                    <form method="POST" action="{{ route('user.auth.postLogin') }}" class="wd-300">
                        @csrf
                        <h3 class="mg-b-5 tx-left">Login</h3>
                        <p class="tx-12 mg-b-30 tx-left">Don’t have an account? <a href="{{ route('user.auth.register') }}" class="color">Request accout</a></p>
                        <div class="form-group tx-left">
                            <label class="mg-b-5">User name</label>
                            <input name="email" value="{{ old('email') }}" class="form-control" placeholder="User name">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0">Password</label>
                                <a href="{{ route('user.auth.getForgot') }}" class="tx-15 mg-b-0 color">Forgot password?</a>
                            </div>
                            <input name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button class="btn btn-lg btn-outline-primary rounded-pill btn-block waves-effect">Login</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8 bg-image hidden-sm">
            </div>
        </div>
    </div>
    <!--/ Page Content End -->
@endsection
@section('js')
@endsection
