@extends('cms.layouts.master')
@section('title')
    User
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
                    <form action="{{ route('cms.user.update',$user->id) }}" method="post" class="modal-body col-12" enctype="multipart/form-data">
                        @csrf
                        <div class="col col-12  custom-fieldset">
                            <!--  status radio buttons -->
                            <div class="row">
                                <div class="col col-12 col-lg-12">
                                    <div class="form-check d-flex justify-content-end">
                                        <label class="form-check-label m-0" style="font-size: 13px ; padding: 6px 28px">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   name="status"
                                                   value="{{ Config::get('const.status.yes') }}"
                                                   @if ($user->status ==  Config::get("const.status.yes"))
                                                   checked
                                                   @endif
                                                   {{ old('status') == Config::get("const.status.yes") ? 'checked' : '' }}>
                                            Active
                                        </label>
                                        <label class="form-check-label m-0" style="font-size: 13px; padding: 6px 28px">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   name="status"
                                                   value="{{ Config::get('const.status.no') }}"
                                                   @if ($user->status ==  Config::get("const.status.no"))
                                                   checked
                                                   @endif
                                                   {{ old('status') == Config::get("const.status.no") ? 'checked' : '' }}>
                                            Inactive
                                        </label>
                                    </div>
                                    <p class="w-100 error text-danger d-flex justify-content-end">{{ $errors->first('status') }}</p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="row d-flex flex-wrap">
                                    <div class="col-12  p-0 m-0">
                                        <div class="col col-12 ">Name</div>
                                        <div class="col col-12 col-lg-12 mt-2">
                                            <input class="form-control w-100" name="name" id="name" type="text" value="{{ old('name', $user->name) }}">
                                            <p class="w-100 error text-danger">{{ $errors->first('name') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="row d-flex flex-wrap">
                                    <div class="col-12 col-md-6 p-0 m-0">
                                        <div class="col col-12 ">Email</div>
                                        <div class="col col-12 col-lg-12 mt-2">
                                            <input class="form-control w-100" name="email" id="email" type="text" value="{{ old('email', $user->email) }}">
                                            <p class="w-100 error text-danger">{{ $errors->first('email') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 p-0 m-0">
                                        <div class="col col-12 ">Password</div>
                                        <div class="col col-12 col-lg-12 mt-2">
                                            <input class="form-control w-100" name="password" id="password" type="password" value="{{ old('password', $user->password_text) }}">
                                            <p class="w-100 error text-danger">{{ $errors->first('password') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('cms.user.index') }}" class="btn btn-secondary waves-effect">Back</a>
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
