@extends('cms.layouts.master')
@section('title')
Setting
@endsection
@section('css')
@endsection

@section('content')
    <div class="page-inner-content">
        <div class="row no-gutters">
            <!--================================-->
            <!-- Page Content Area Start -->
            <!--================================-->
            <div class="col-lg-12 page-content-area ">
                <div class="inner-content">
                    <form action="{{ route('cms.setting.create') }}" method="post" class="modal-body col-12" enctype="multipart/form-data">
                        @csrf
                        <div class="col col-12  custom-fieldset">
                            <div class="mb-4">
                                <div class="row d-flex flex-wrap">
                                    <div class="col-12 col-md-6 p-0 m-0">
                                        <div class="col col-12 ">Login ID</div>
                                        <div class="col col-12 col-lg-12 mt-2">
                                            <input class="form-control w-100" name="login_id" id="login_id" type="text" value="{{ old('login_id', $setting->login_id ?? '') }}">
                                            <p class="w-100 error text-danger">{{ $errors->first('login_id') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 p-0 m-0">
                                        <div class="col col-12 ">Password</div>
                                        <div class="col col-12 col-lg-12 mt-2">
                                            <input class="form-control w-100" name="password" id="password" type="password" value="{{ old('password', $setting->password_text ?? '') }}">
                                            <p class="w-100 error text-danger">{{ $errors->first('password') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/ Page Content Area End -->
            <!--================================-->
        </div>
    </div>
@endsection
@section('js')
@endsection
