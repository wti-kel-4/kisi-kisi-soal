<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionGrid;
use Illuminate\Support\Facades\DB;

class QuestionGridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        QuestionGrid::create([
            'id' => 1,
            'teachers_id' => 6,
            'grade_specializations_id' => 1,
            'type' => 'PTS',
            'studies_id' => 1,
            'time_allocation' => 90,
            'total' => 25,
            'school_year' => '2020-2021',
            'form' => 'pg',
            'basic_competencies_id' => 1,
            'indicator' => 'Menentukan Nilai limit fungsi trigonometri dengan - cara subtitusi langsung. - menggunakan rumus-rumus pada limit. -teknik D’Hospital',
            'lessons_id' => 1,
            'sorting_number' => 1,
            'start_number' => 1,
            'end_number' => 10,
        ]);

        */

        /* ----- ditta ----- */
        DB::table('question_grids')->insert([
            [
                'id' => 1,
                'teachers_id' => 72,
                'type' => 'PTS',
                'studies_id' => 3,
                'time_allocation' => 90,
                'total' => 20,
                'school_year' => '2020-2021',
                'form' => 'pg',
                'basic_competencies_id' => 8,
                'grade_specializations_id' => 9,
                'indicator' => 'Disajikan pernyataan situasi, siswa dapat mengucapkan ungkapan yang tepat sesuai dengan situasi',
                'lessons_id' => 5,
                'sorting_number' => 1,
                'start_number' => 1,
                'end_number' => 10,
                'created_at' => '2021-03-17 15:06:46',
                'updated_at' => '2021-03-17 15:06:46',
            ],
        ]);
    }
}
