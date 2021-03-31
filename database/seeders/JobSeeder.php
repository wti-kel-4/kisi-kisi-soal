<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'id' => 1,
            'name' => 'Guru'
        ]);
        Job::create([
            'id' => 2,
            'name' => 'Kepala Sekolah',
        ]);
        Job::create([
            'id' => 3,
            'name' => 'Tukang Kebun',
        ]);
        Job::create([
            'id' => 4,
            'name' => 'Bagian Kebersihan'
        ]);
        Job::create([
            'id' => 5,
            'name' => 'Waka Kurikulum'
        ]);
        Job::create([
            'id' => 6,
            'name' => 'Waka Kesiswaan'
        ]);
    }
}
