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
            'teachers_id' => 1,
            'grades_id' => 2
        ]);
        Study::create([
            'id' => 2,
            'name' => 'Matematika (P)',
            'teachers_id' => 6,
            'grades_id' => 2
        ]);
        Study::create([
            'id' => 3,
            'name' => 'Bahasa dan Sastra Jepang',
            'teachers_id' => 72,
            'grades_id' => 36
        ]);
    }
}
