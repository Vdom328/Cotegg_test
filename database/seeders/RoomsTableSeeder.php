<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Lấy đường dẫn của ảnh mẫu từ thư mục public
         $publicImagePath = public_path('assets/images/bg/authen-bg.jpg');

         // Kiểm tra xem tệp ảnh mẫu có tồn tại không
         if (File::exists($publicImagePath)) {
             $imageName = time() . '_' . uniqid() . '.jpg';
              // Đọc nội dung của tệp ảnh và lưu vào thư mục storage
            $imageContent = file_get_contents($publicImagePath);
            Storage::put('public/room_images/' . $imageName, $imageContent);
         }

        for ($i = 1; $i <= 20; $i++) {
            DB::table('rooms')->insert([
                'name' => 'Room ' . $i,
                'room_type' => rand(1, 3),
                'price' => rand(50, 200),
                'status' => 1,
                'memo' => 'This is Room ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);



            // Lưu đường dẫn của ảnh vào cơ sở dữ liệu
            DB::table('rooms_images')->insert([
                'room_id' => $i,
                'image' => $imageName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
