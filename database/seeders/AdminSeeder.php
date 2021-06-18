<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'id' => 1,
            'name' => 'Administrator',
            'username' => 'Admin',
            'password' => '$2b$10$OZ.MmiImspbAYTbI/VsbEOis5sfmSXo75gpomRixXLGLnsnGLXiD2'
        ]);
    }
}
