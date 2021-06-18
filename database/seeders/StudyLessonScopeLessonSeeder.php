<?php

namespace Database\Seeders;

use App\Models\StudyLessonScopeLesson;
use Illuminate\Database\Seeder;

class StudyLessonScopeLessonSeeder extends Seeder
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
            StudyLessonScopeLesson::create($data);
        }
    }
}
