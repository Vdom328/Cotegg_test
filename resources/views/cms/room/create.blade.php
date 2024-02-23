@extends('cms.layouts.master')
@section('title')
    Room
@endsection
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/dataTable/datatables.min.css') }}">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets/plugins/dataTable/extensions/dataTables.jqueryui.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/swiper/css/swiper.min.css') }}">
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <style>
        .dz-progress {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="page-inner-content">
        <div class="row no-gutters">
            <!--================================-->
            <!-- Page Content Area Start -->
            <!--================================-->
            <div class="col-lg-12 page-content-area ">
                <div class="inner-content">
                    <form class="modal-body col-12" id="myForm">
                        @csrf
                        <div class="col col-12  custom-fieldset">
                            <!-- Account status radio buttons -->
                            <div class="row">
                                <div class="col col-12 col-lg-12">
                                    <div class="form-check d-flex justify-content-end">
                                        <label class="form-check-label m-0" style="font-size: 13px ; padding: 6px 28px">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   name="status"
                                                   value="{{ Config::get('const.status.yes') }}"
                                                   {{ old('status') == Config::get("const.status.yes") ? 'checked' : '' }}>
                                            Active
                                        </label>
                                        <label class="form-check-label m-0" style="font-size: 13px; padding: 6px 28px">
                                            <input type="radio"
                                                   class="form-check-input"
                                                   name="status"
                                                   value="{{ Config::get('const.status.no') }}"
                                                   {{ old('status') == Config::get("const.status.no") ? 'checked' : '' }}>
                                            Inactive
                                        </label>
                                    </div>
                                    <p class="w-100 error text-danger d-flex justify-content-end">
                                        {{ $errors->first('status') }}</p>
                                </div>
                            </div>
                            <!-- images input field -->
                            <div class="col col-12 p-0 ">Images<span class="text-danger">*</span></div>
                            <div id="myDropzone" class="mb-4 dropzone"></div>

                            <!-- name input field -->
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col col-12 ">Name<span class="text-danger">*</span></div>
                                    <div class="col col-12 col-lg-12 mt-2">
                                        <input class="form-control w-100" name="name" id="name" type="text"
                                            value="{{ old('name') }}">
                                        <p class="w-100 error text-danger">{{ $errors->first('name') }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="row d-flex flex-wrap">
                                    <div class="col-12 col-md-6 p-0 m-0">
                                        <div class="col col-12 ">Room type <span class="text-danger">*</span></div>
                                        <div class="col col-12 col-lg-12 mt-2">
                                            <select class="form-control w-100" name="room_type" id="room_type">
                                                @foreach ($type as $item)
                                                    <option value="{{ $item['value'] }}">{{ $item['name'] }}</option>
                                                @endforeach
                                            </select>
                                            <p class="w-100 error text-danger">{{ $errors->first('room_type') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 p-0 m-0">
                                        <div class="col col-12 ">Price <span class="text-danger">*</span></div>
                                        <div class="col col-12 col-lg-12 mt-2">
                                            <input class="form-control w-100" name="price" id="price" type="number"
                                                value="{{ old('price') }}">
                                            <p class="w-100 error text-danger">{{ $errors->first('price') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- memo --}}
                            <div class="mb-4">
                                <div class="row d-flex flex-wrap">
                                    <div class="col-12 col-md-12 p-0 m-0">
                                        <div class="col col-12 ">Memo</div>
                                        <div class="col col-12 col-lg-12 mt-2">
                                            <textarea name="memo" id="memo" class="col-12 form-control" rows="10">{{ old('memo') }}</textarea>
                                            <p class="w-100 error text-danger">{{ $errors->first('memo') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('cms.room.index') }}" class="btn btn-secondary waves-effect">Back</a>
                            <button type="button" class="btn btn-success waves-effect" id="submitForm">Save</button>
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
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <script>
        $(document).ready(function() {
            Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#myDropzone", {
                url: "dummy-url",
                acceptedFiles: 'image/*',
                maxFiles: 10,
                dictDefaultMessage: "Drag and drop photos here or click to upload",
                dictInvalidFileType: "Only image files are accepted",
                autoProcessQueue: false,
                addRemoveLinks: true,
            });
            $(document).on("click", "#submitForm", function() {
                var formData = new FormData($("#myForm")[0]);
                var files = myDropzone.files;

                for (var i = 0; i < files.length; i++) {
                    formData.append("images[]", files[i]);
                }

                $.ajax({
                    url: "{{ route('cms.room.create') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        window.location.href = response.route;
                    },
                    error: function(error) {}
                });
            });
        });
    </script>
@endsection
