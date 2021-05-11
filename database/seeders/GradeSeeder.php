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
            'grade_generalizations_id' => 1
        ]);
        Grade::create([
            'name' => 'XII MIPA Efektif 2',
            'teachers_id' => 16, 
            'grade_generalizations_id' => 1
        ]);
        Grade::create([
            'name' => 'XII MIPA 3',
            'teachers_id' => 29,
            'grade_generalizations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII MIPA 4',
            'teachers_id' => 66,
            'grade_generalizations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII MIPA 5',
            'teachers_id' => 19,
            'grade_generalizations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII MIPA 6',
            'teachers_id' => 3,
            'grade_generalizations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII MIPA 7',
            'teachers_id' => 6,
            'grade_generalizations_id' => 2
        ]);
        Grade::create([
            'name' => 'XII IPS 1',
            'teachers_id' => 13,
            'grade_generalizations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 2',
            'teachers_id' => 4,
            'grade_generalizations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 3',
            'teachers_id' => 44,
            'grade_generalizations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 4',
            'teachers_id' => 48,
            'grade_generalizations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 5',
            'teachers_id' => 26,
            'grade_generalizations_id' => 3
        ]);
        Grade::create([
            'name' => 'XII IPS 6',
            'teachers_id' => 56,
            'grade_generalizations_id' => 3
        ]);
        Grade::create([
            'name' => 'XI MIPA Efektif 1',
            'teachers_id' => 14,
            'grade_generalizations_id' => 1
        ]);
        Grade::create([
                    'name' => 'XI MIPA Efektif 2',
                    'teachers_id' => 40,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI MIPA 3',
                    'teachers_id' => 18,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI MIPA 4',
                    'teachers_id' => 12,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI MIPA 5',
                    'teachers_id' => 34,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI MIPA 6',
                    'teachers_id' => 57,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI MIPA 7',
                    'teachers_id' => 38,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI MIPA 8',
                    'teachers_id' => 33,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI IPS 1',
                    'teachers_id' => 63,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI IPS 2',
                    'teachers_id' => 64,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI IPS 3',
                    'teachers_id' => 28,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI IPS 4',
                    'teachers_id' => 68,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI IPS 5',
                    'teachers_id' => 10,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'XI IPS 6',
                    'teachers_id' => 35,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X MIPA Efektif 1',
                    'teachers_id' => 7,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X MIPA Efektif 2',
                    'teachers_id' => 49,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X MIPA 3',
                    'teachers_id' => 15,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X MIPA 4',
                    'teachers_id' => 46,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X MIPA 5',
                    'teachers_id' => 54,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X MIPA 6',
                    'teachers_id' => 37,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X MIPA 7',
                    'teachers_id' => 21,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X MIPA 8',
                    'teachers_id' => 11,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X IPS 1',
                    'teachers_id' => 52,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X IPS 2',
                    'teachers_id' => 27,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
                    'name' => 'X IPS 3',
                    'teachers_id' => 32,
                    'grade_generalizations_id' => 1
                ]);
        Grade::create([
            'name' => 'X IPS 4',
            'teachers_id' => 17,
            'grade_generalizations_id' => 1
        ]);
        Grade::create([
            'name' => 'X IPS 5',
            'teachers_id' => 60,
            'grade_generalizations_id' => 1
        ]);
    }
}
