<?php

namespace Database\Seeders;

use App\Models\TeacherGradeGeneralization;
use Illuminate\Database\Seeder;

class TeacherGradeGeneralizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [[
            'id' => '1',
            'teachers_id' => '16',
            'grade_generalizations_id' => '2',
        ],
        [
            'id' => '2',
            'teachers_id' => '16',
            'grade_generalizations_id' => '3',
        ],
        [
            'id' => '3',
            'teachers_id' => '16',
            'grade_generalizations_id' => '1',
        ],
        [
            'id' => '4',
            'teachers_id' => '16',
            'grade_generalizations_id' => '10',
        ]];

        foreach($datas as $data){
            TeacherGradeGeneralization::create($data);
        }
    }
}
