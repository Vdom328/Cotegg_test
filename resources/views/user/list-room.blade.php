@php
    use App\Classes\Enum\RoomTypeEnum;
@endphp
@foreach ($rooms as $room)
    <div class="col-xl-3 col-md-4 col-6 p-2 product_room">
        <div class="card p-3" style="background-color: #f8f9fa; border-radius: 10px;">
            @php
                $image = $room->roomImages->first()
            @endphp
            @if ($image->image || $image->image !== ''  )
            <img src="{{ asset('storage/room_images/' . $image->image) }}" alt="Room Image " class="card-img-top img-fluid"
            style="border-radius: 10px;">
            @else
            <img src="{{ asset('assets/images/bg/authen-bg.jpg') }}" alt="Room Image " class="card-img-top img-fluid"
                style="border-radius: 10px;">
            @endif

            <div class="card-body p-2">
                <h5 class="card-title fw-bold mb-0"> {{ $room->name }}</h5>
                <div class="d-flex flex-wrap justify-content-between mt-3">
                    <p class="card-text mb-2"><i class="fas fa-bed"></i>
                        {{ RoomTypeEnum::getLabel($room->room_type) }}</p>
                    <p class="card-text mb-2"><i class="fas fa-dollar-sign"></i>
                        {{ number_format($room->price) }}</p>
                    <!-- Icon giá phòng -->
                    <p class="card-text mb-2"><i class="fas fa-check-circle"></i>
                        @if ($room->status == Config::get('const.status.yes'))
                            Active
                        @else
                            Inactive
                        @endif
                    </p>
                    <!-- Icon tình trạng phòng -->
                </div>
            </div>
            <div class="card-footer bg-transparent border-0 text-center">
                <a href="#" class="btn btn-primary "><i class="fas fa-calendar-plus"></i> Book Now</a>
                <!-- Icon và button đặt phòng -->
            </div>
        </div>
    </div>
@endforeach
