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
        $datas = [];

        foreach($datas as $data){
            TeacherGradeGeneralization::create($data);
        }
    }
}
