<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionGrid;

class QuestionGridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionGrid::create([
            'id' => 1,
            'teachers_id' => 6,
            'type' => 'PTS',
            'studies_id' => 1,
            'time_allocation' => 90,
            'total' => 25,
            'school_year' => '2020-2021',
            'basic_competencies_id' => 1,
            'indicator' => 'Menentukan Nilai limit fungsi trigonometri dengan - cara subtitusi langsung. - menggunakan rumus-rumus pada limit. -teknik D’Hospital',
            'start_number' => 1,
            'end_number' => 10,
        ]);
    }
}
