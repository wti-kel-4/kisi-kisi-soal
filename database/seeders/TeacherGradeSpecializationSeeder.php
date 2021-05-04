<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeacherGradeSpecialization;

class TeacherGradeSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherGradeSpecialization::create([
            'id' => '1',
            'teachers_id' => '1',
            'grade_specializations_id' => '1',
        ]);

        TeacherGradeSpecialization::create([
            'id' => '2',
            'teachers_id' => '1',
            'grade_specializations_id' => '2',
        ]);

        TeacherGradeSpecialization::create([
            'id' => '3',
            'teachers_id' => '1',
            'grade_specializations_id' => '3',
        ]);
    }
}
