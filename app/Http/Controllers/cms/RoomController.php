<?php

namespace App\Http\Controllers\cms;

use App\Classes\Enum\RoomTypeEnum;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    public function index()
    {
        $rooms =Room::paginate(10);
        return view('cms.room.index', compact('rooms'));
    }

    public function store()
    {
        $type = $this->getType();
        return view('cms.room.create', compact('type'));
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

    public function create(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'room_type' => 'required',
            'price' => 'required|integer',
            'status' => 'required|integer',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorMsgs = json_decode($errors);
            return response()->json(['errors' => $errorMsgs], 422);
        }
        $data = $this->storeRoom($request->all());

        if (!$data) {
            return response()->json(['route' => route('cms.room.index'),'error' => 'An error occurred, please try again !']);
        }
        // Return a success
        Session::flash('success', "Store room successfully !");
        return response()->json(['route' => route('cms.room.index')]);
    }

    /**
     *
     */
    private function storeRoom($data)
    {
        DB::beginTransaction();
        try {
            $attr = [
                'name' => $data['name'],
                'room_type' => $data['room_type'],
                'price' => $data['price'],
                'status' => $data['status'],
                'memo' => $data['memo'],
            ];

            $room = Room::create($attr);
            $attribute = [];
            foreach ($data['images'] as $img) {
                if ($img) {
                    $imageName = time() . '_' . uniqid() . '.' . $img->extension();
                    $img->storeAs('public/room_images/', $imageName);
                    $attribute[] = [
                        'room_id' => $room->id,
                        'image' => $imageName
                    ];
                }
            };
            $room_images = RoomImages::insert($attribute);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to create room: ' . $e->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $room = Room::destroy($id);

            RoomImages::where('room_id', $id)->delete();
            DB::commit();
            Session::flash('success', "Delete successfully!");
            return response()->json();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to delete room: ' . $e->getMessage());
            return response()->json();
        }
    }

    public function edit($id)
    {
        $room = Room::find($id);
        $type = $this->getType();
        return view('cms.room.edit',compact('room','type'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'room_type' => 'required',
            'price' => 'required',
            'status' => 'required|integer',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorMsgs = json_decode($errors);
            return response()->json(['errors' => $errorMsgs], 422);
        }
        $data = $this->updateRoom($request->all(),$id);

        if (!$data) {
            return response()->json(['route' => route('cms.room.index'),'error' => 'An error occurred, please try again !']);
        }
        // Return a success
        Session::flash('success', "Update room successfully !");
        return response()->json(['route' => route('cms.room.index')]);
    }

    private function updateRoom($data,$id)
    {
        DB::beginTransaction();
        try {
            $attr = [
                'name' => $data['name'],
                'room_type' => $data['room_type'],
                'price' => $data['price'],
                'status' => $data['status'],
                'memo' => $data['memo'],
            ];

            $room = Room::find($id)->first()->update($attr);

            $room = RoomImages::where('room_id',$id)->delete();

            $attribute = [];
            foreach ($data['images'] as $img) {
                if ($img) {
                    $imageName = time() . '_' . uniqid() . '.' . $img->extension();
                    $img->storeAs('public/room_images/', $imageName);
                    $attribute[] = [
                        'room_id' => $id,
                        'image' => $imageName
                    ];
                }
            };
            $room_images = RoomImages::insert($attribute);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Failed to update room: ' . $e->getMessage());
            return false;
        }
    }
}
