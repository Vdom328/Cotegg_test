@php
    use App\Classes\Enum\RoomTypeEnum;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    @vite(['resources/css/home.css'])
</head>

<body>
    <!-- Banner -->
    <div class="banner">
        <img src="{{ asset('assets/images/bg/exchange-bg.png') }}" class="img-fluid" alt="Banner Image">
        <div class="header-container">
            <h1 class="header">Hotel Booking</h1>
            <div class="dropdown">
                <img class="avatar dropdown-toggle" id="avatarDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                    src="{{ asset('images/th (3).jpg') }}" alt="Avatar">
                <ul class="dropdown-menu" aria-labelledby="avatarDropdown">
                    <li><a class="dropdown-item" href="{{ route('user.auth.getLogout') }}">Logout</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-container col-12 d-flex flex-wrap">
            <div class="col-md-2 col-6 pe-2 mb-md-0 mb-2">
                <input type="text" class="form-control" id="key_name" placeholder="Room namne">
            </div>
            <div class="col-md-2 col-6 pe-2 mb-md-0 mb-2">
                <select name="room_type" id="room_type" class="form-control">
                    <option value="">Room type</option>
                    @foreach ($type as $room_type)
                        <option value="{{ $room_type['value'] }}">{{ $room_type['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 col-6 pe-2 mb-md-0 mb-2">
                <input type="number" class="form-control" placeholder="Minimum Price" id="min-price">
            </div>
            <div class="col-md-2 col-6 pe-2 mb-md-0 mb-2">
                <input type="number" class="form-control" placeholder="Maximum Price" id="max-price">
            </div>
            <button class="btn btn-primary" id="btn_filter">FIND</button>
        </div>
    </div>
    <div class="container">
        <div class="col-12 d-flex flex-wrap" id="list_rooms">
            @include('user.list-room')
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btn_filter', function() {
                $.ajax({
                    type: 'get',
                    data: {
                        key_name: $('#key_name').val(),
                        room_type: $('#room_type').val(),
                        min_price: $('#min-price').val(),
                        max_price: $('#max-price').val(),
                    },
                    url: "{{ route('user.home.filter') }}",
                    success: function(response) {
                        if (response) {
                            $('#list_rooms').html(response)
                        }
                    },
                });
            })

        });
    </script>
</body>

</html>
