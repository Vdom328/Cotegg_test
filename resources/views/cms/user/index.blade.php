@extends('cms.layouts.master')
@section('title')
User
@endsection
@section('css')
    <style>

        a:hover {
            cursor: pointer;
            color: #5c76fb;
        }
        
    </style>
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
                        <a href="{{ route('cms.user.store') }}" type="button" class="btn btn-primary waves-effect mb-3" >
                            Create User
                        </a>
                    </div>
                    <div class="custom-fieldset-style mg-b-30">
                        <div class="clearfix">
                            <div class="clearfix">
                                <table id="basicDataTable"
                                    class="table table-bordered responsive nowrap hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item )
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @if ($item->status == Config::get("const.status.yes"))
                                                        Active
                                                        @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->password_text }}</td>
                                                <td>
                                                    <a href="{{ route('cms.user.profile', $item->id) }}"
                                                        class="table-action  mg-r-10" href="#"><i
                                                            class="fa fa-pencil"></i></a>
                                                    <a data-id="{{ $item->id }}" class="table-action " id="deleteUser"
                                                        data-toggle="modal" data-target="#deleteModal"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{-- {{ $users->links('pagination::custom') }} --}}
                                {{ $users->links('pagination.custom') }}
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
    <!-- END: Vendor JS-->
    <!-- BEGIN: Init JS-->
    <script>
        $(document).ready(function() {
            // Basic DataTable
            // add User
            $(document).on('click', '#deleteUser', function() {
                var id = $(this).attr('data-id');
                var deleteUrl = "{{ route('cms.user.delete', ['id' => ':id']) }}".replace(':id', id);
                $("#deleteModal").modal("show");
                $("#confirmDeleteBtn").on("click", function(event) {
                    event.preventDefault();
                    $.ajax({
                        url: deleteUrl,
                        type: 'Delete',
                        success: function(data) {
                            $('#user-' + data.id).hide();
                            $("#deleteModal").modal("hide");
                            $.growl.success({
                                message: 'Delete user successfully !'
                            });
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
