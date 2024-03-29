@extends('user.auth.layout.master')
@section('title')
Forgot Password
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
                    <form action="{{ route('user.auth.postForgot') }}" method="post" class="wd-300">
                        @csrf
                        <h3 class="mg-b-5 tx-left">Reset Your Password</h3>
                        <p class="tx-12 mg-b-30 tx-left">Enter your email address and we will send you a link to
                            reset your password.</p>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0">Email </label>
                            </div>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0">Password</label>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Enter your password">
                        </div>
                        <div class="form-group">
                            <div class="d-flex justify-content-between mg-b-5">
                                <label class="mg-b-0">Confirm Password</label>
                            </div>
                            <input name="confirm-password" type="password" class="form-control" placeholder="Enter your confirm password">
                        </div>
                        <button type="submit" class="btn btn-lg btn-outline-primary rounded-pill btn-block waves-effect">Reset
                            Password</button>
                        <div class="tx-15 mg-t-20 tx-center">Login as a different <a href="{{ route('user.auth.getLogin') }}"
                                class="tx-dark">Account</a></div>
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
