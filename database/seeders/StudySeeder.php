<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Study;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Study::create([
            'id' => 1,
            'name' => 'Bahasa Indonesia',
            'grades_id' => 2
        ]);
        Study::create([
            'id' => 2,
            'name' => 'Matematika (P)',
            'grades_id' => 2
        ]);
        Study::create([
            'id' => 3,
            'name' => 'Bahasa dan Sastra Jepang',
            'grades_id' => 36
        ]);
    }
}
