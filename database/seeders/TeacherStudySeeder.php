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
        $datas = [];

        foreach($datas as $data){
            TeacherStudy::create($data);
        }
    }
}
