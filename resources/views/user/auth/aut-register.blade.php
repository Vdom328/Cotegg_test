@extends('user.auth.layout.master')
@section('title')
Register
@endsection
@section('css')

@endsection

@section('content')
    <!--================================-->
    <!-- Page Content Start -->
    <!--================================-->
    <div class="ht-100v text-center">
        <div class="row no-gutters pd-0 mg-0">
            <div class="col-lg-4 bg-gray-100">
                <div class="ht-100v d-flex align-items-center justify-content-center">
                    <form method="POST" action="{{ route('user.auth.postRegister') }}" class="wd-300">
                        @csrf
                        <h3 class="mg-b-5 tx-left">Register</h3>
                        <div class="form-group tx-left">
                            <label class="mg-b-5">Name</label>
                            <input name="name" class="form-control" value="" placeholder="Enter your name">
                        </div>
                        <div class="form-group tx-left">
                            <label class="mg-b-5">Email address</label>
                            <input name="email" class="form-control" value="" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0">Password</label>
                                <a href="{{ route('user.auth.getLogin') }}" class="tx-15 mg-b-0">Sign In ?</a>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0">Confirm Password</label>
                            </div>
                            <input name="confirm-password" type="password" class="form-control" placeholder="Enter your confirm password">
                        </div>
                        <button class="btn btn-lg btn-outline-primary rounded-pill btn-block waves-effect">Register</button>
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
