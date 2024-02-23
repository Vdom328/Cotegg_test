<?php

namespace App\Http\Controllers\user;

use App\Classes\Enum\RoomTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $type = $this->getType();
        $rooms = Room::all();
        return view('user.home', compact('type', 'rooms'));
    }

    public function getType(): array
    {
        $typeValues = [];
        $typeCases = RoomTypeEnum::cases();
        foreach ($typeCases as $type) {
            $typeValues[] = [
                'value' => $type->value,
                'name' => RoomTypeEnum::getLabel($type->value)
            ];
        }
        return $typeValues;
    }

    public function filter(Request $request)
    {
        $keyName = $request->input('key_name');
        $roomType = $request->input('room_type');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Query rooms based on conditions
        $rooms = Room::query();
        if ($keyName) {
            $rooms->where('name', 'like', "%$keyName%");
        }

        if ($roomType) {
            $rooms->where('room_type', $roomType);
        }

        if ($minPrice) {
            $rooms->where('price', '>=', $minPrice);
        }

        if ($maxPrice) {
            $rooms->where('price', '<=', $maxPrice);
        }

        $rooms = $rooms->get();

        $html = View('user.list-room', compact('rooms'))->render();

        return response()->json($html);
    }
}
