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
            'name' => 'Matematika (P)',
            'teachers_id' => 6,
            'grades_id' => 2
        ]);
    }
}
