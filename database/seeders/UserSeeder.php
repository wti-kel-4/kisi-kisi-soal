<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'teachers_id' => 1,
            'username' => 'user1',
            'password' => '$2b$10$Xcx8DqqZn/J9x93y/3ve.ezoS/DkdpwzoqdXQA0xs7urER0J.kwCS',
            'url_photo' => 'user/photo/gambar.jpg'
        ]);

        User::create([
            'id' => 2,
            'teachers_id' => 16,
            'username' => 'user2',
            'password' => '$2b$10$d1m5ntbvIuXzk3v870fboei7/Kx4l1y9CQ0HMlfBGnCQLyuE/Q.pe',
            'url_photo' => 'user/photo/gambar.jpg'
        ]);
    }
}
