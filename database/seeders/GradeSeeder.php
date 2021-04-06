<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            'name' => 'XII MIPA Efektif 1',
            'teachers_id' => 59,
            'grade_specializations_id' => 1
        ]);
        Grade::create([
            'name' => 'XII MIPA Efektif 2',
            'teachers_id' => 16, 
            'grade_specializations_id' => 1
        ]);
        Grade::create([
            'name' => 'XII MIPA 3',
            'teachers_id' => 29,
            'grade_specializations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII MIPA 4',
            'teachers_id' => 66,
            'grade_specializations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII MIPA 5',
            'teachers_id' => 19,
            'grade_specializations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII MIPA 6',
            'teachers_id' => 3,
            'grade_specializations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII MIPA 7',
            'teachers_id' => 6,
            'grade_specializations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII IPS 1',
            'teachers_id' => 13,
            'grade_specializations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 2',
            'teachers_id' => 4,
            'grade_specializations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 3',
            'teachers_id' => 44,
            'grade_specializations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 4',
            'teachers_id' => 48,
            'grade_specializations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 5',
            'teachers_id' => 26,
            'grade_specializations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 6',
            'teachers_id' => 56,
            'grade_specializations_id' => 3
        ]);
    }
}
