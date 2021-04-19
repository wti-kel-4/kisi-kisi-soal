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
            'name' => 'Hello Admin 1',
            'username' => 'admin1',
            'password' => '$2b$10$LG1S/ftGKRa5y3U96PFDfeC2LlcFT.MhkO00TTCgQcsyGFZc5nh4C'
        ]);
    }
}
