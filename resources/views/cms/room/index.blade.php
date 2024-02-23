@php

use App\Classes\Enum\RoomTypeEnum;
@endphp
@extends('cms.layouts.master')
@section('title')
    Room
@endsection
@section('css')
    <style>
        a:hover {
            cursor: pointer;
            color: #5c76fb;
        }

        .carousel-item.active {
            width: 160px;
            height: 160px;
            text-align: center;
            display: flex !important;
            justify-content: center;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="page-inner-content">
        <div class="row no-gutters">
            <!--================================-->
            <!-- Page Content Area Start -->
            <!--================================-->
            <div class="col-lg-12 page-content-area">
                <div class="inner-content">
                    <div class="col-12 d-flex justify-content-end p-0">
                        <a href="{{ route('cms.room.store') }}" type="button" class="btn btn-primary waves-effect mb-3">
                            Create Room
                        </a>
                    </div>
                    <div class="custom-fieldset-style mg-b-30">
                        <div class="clearfix">
                            <div class="clearfix">
                                <table id="basicDataTable"
                                    class="table table-bordered responsive nowrap hover table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-2">Images</th>
                                            <th>Name</th>
                                            <th>Room type</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rooms as $room)
                                            <tr>
                                                <td class="images_room">
                                                    <div id="carousel-{{ $room->id }}" class="carousel slide"
                                                        data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            @foreach ($room->roomImages as $index => $image)
                                                                <div
                                                                    class="carousel-item{{ $index == 0 ? ' active' : '' }}">
                                                                    <img src="{{ asset('storage/room_images/' . $image->image) }}"
                                                                        alt="" width="100%">
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <!-- Nút "prev" -->
                                                        <a class="carousel-control-prev"
                                                            href="#carousel-{{ $room->id }}" role="button"
                                                            data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </a>

                                                        <!-- Nút "next" -->
                                                        <a class="carousel-control-next"
                                                            href="#carousel-{{ $room->id }}" role="button"
                                                            data-bs-slide="next">
                                                            <span class="carousel-control-next-icon"
                                                                aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="pl-4">{{ $room->name }}</td>
                                                <td class="pl-4">{{ RoomTypeEnum::getLabel($room->room_type) }}</td>
                                                <td class="pl-4">{{ number_format($room->price) }}</td>
                                                <td class="pl-4">
                                                    <td>
                                                        @if ($room->status == Config::get("const.status.yes"))
                                                            Active
                                                            @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('cms.room.edit', $room->id) }}" class="table-action mg-r-10"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a data-id="{{ $room->id }}" class="table-action" id="deleteroom"
                                                        data-toggle="modal" data-target="#deleteModal"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="col-2">Images</th>
                                            <th>Name</th>
                                            <th>Room type</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{-- {{ $users->links('pagination::custom') }} --}}
                                {{ $rooms->links('pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--/ Page Content Area End -->
            <!--================================-->
        </div>
    </div>
    @include('modals.delete')
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- END: Vendor JS-->
    <!-- BEGIN: Init JS-->
    <script>
        $(document).ready(function() {
            // Basic DataTable
            $('.carousel').carousel();
            $(document).on('click', '#deleteroom', function() {
                var id = $(this).attr('data-id');
                var deleteUrl = "{{ route('cms.room.delete', ['id' => ':id']) }}".replace(':id', id);
                $("#deleteModal").modal("show");
                $("#confirmDeleteBtn").on("click", function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: deleteUrl,
                        type: 'Delete',
                        success: function(data) {
                            window.location.reload();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $.growl.error({
                                message: 'An error occurred, please try again !'
                            });
                        },
                    });
                });
            });

        });
    </script>
@endsection
