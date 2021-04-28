<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeacherGrade;

class TeacherGradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherGrade::create([
            'id' => '1',
            'teachers_id' => '1',
            'grades_id' => '1',
        ]);

        TeacherGrade::create([
            'id' => '2',
            'teachers_id' => '1',
            'grades_id' => '2',
        ]);

        TeacherGrade::create([
            'id' => '3',
            'teachers_id' => '1',
            'grades_id' => '3',
        ]);
    }
}
