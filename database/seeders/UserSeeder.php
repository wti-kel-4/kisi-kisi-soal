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
            'url_photo' => '/user/photo/gambar.jpg'
        ]);
    }
}
