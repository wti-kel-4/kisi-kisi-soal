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
        $datas = [
            [
                'id' => '1',
                'studies_id' => '4',
                'scope_lessons_id' => '1',
                'lessons_id' => '15'
            ],
            [
                'id' => '2',
                'studies_id' => '4',
                'scope_lessons_id' => '1',
                'lessons_id' => '16'
            ],
            [
                'id' => '3',
                'studies_id' => '4',
                'scope_lessons_id' => '1',
                'lessons_id' => '17'
            ],
            [
                'id' => '4',
                'studies_id' => '4',
                'scope_lessons_id' => '1',
                'lessons_id' => '18'
            ],
            [
                'id' => '5',
                'studies_id' => '4',
                'scope_lessons_id' => '2',
                'lessons_id' => '19'
            ],
            [
                'id' => '6',
                'studies_id' => '4',
                'scope_lessons_id' => '3',
                'lessons_id' => '20'
            ],
            [
                'id' => '7',
                'studies_id' => '4',
                'scope_lessons_id' => '3',
                'lessons_id' => '21'
            ],
            [
                'id' => '8',
                'studies_id' => '4',
                'scope_lessons_id' => '3',
                'lessons_id' => '22'
            ],
            [
                'id' => '9',
                'studies_id' => '4',
                'scope_lessons_id' => '4',
                'lessons_id' => '23'
            ],
            [
                'id' => '10',
                'studies_id' => '4',
                'scope_lessons_id' => '4',
                'lessons_id' => '24'
            ],
            [
                'id' => '11',
                'studies_id' => '4',
                'scope_lessons_id' => '4',
                'lessons_id' => '25'
            ],
            [
                'id' => '12',
                'studies_id' => '4',
                'scope_lessons_id' => '4',
                'lessons_id' => '26'
            ],
            [
                'id' => '13',
                'studies_id' => '4',
                'scope_lessons_id' => '5',
                'lessons_id' => '27'
            ],
            [
                'id' => '14',
                'studies_id' => '4',
                'scope_lessons_id' => '4',
                'lessons_id' => '28'
            ],
            [
                'id' => '15',
                'studies_id' => '4',
                'scope_lessons_id' => '5',
                'lessons_id' => '29'
            ],
            [
                'id' => '16',
                'studies_id' => '4',
                'scope_lessons_id' => '5',
                'lessons_id' => '30'
            ],
            [
                'id' => '17',
                'studies_id' => '4',
                'scope_lessons_id' => '4',
                'lessons_id' => '31'
            ],
            [
                'id' => '18',
                'studies_id' => '4',
                'scope_lessons_id' => '4',
                'lessons_id' => '32'
            ],
            [
                'id' => '19',
                'studies_id' => '4',
                'scope_lessons_id' => '5',
                'lessons_id' => '33'
            ],

        ];

        foreach($datas as $data){
            StudyLessonScopeLesson::create($data);
        }
    }
}
