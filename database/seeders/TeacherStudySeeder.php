<?php

namespace Database\Seeders;

use App\Models\TeacherStudy;
use Illuminate\Database\Seeder;

class TeacherStudySeeder extends Seeder
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
            'teachers_id' => '1',
            'studies_id' => '2',
        ],
        [
            'id' => '2',
            'teachers_id' => '1',
            'studies_id' => '3',
        ],
        [
            'id' => '3',
            'teachers_id' => '2',
            'studies_id' => '1',
        ]];

        foreach($datas as $data){
            TeacherStudy::create($data);
        }
    }
}
