<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create([
            'studies_id' => 1,
            'grade_specializations_id' => 1,
            'name' => 'Limit Fungsi Trigonometri'
        ]);
        Lesson::create([
            'studies_id' => 1,
            'grade_specializations_id' => 1,
            'name' => 'Limit Fungsi Menuju Ke Takhinggaan'
        ]);
        Lesson::create([
            'studies_id' => 1,
            'grade_specializations_id' => 1,
            'name' => 'Turunan Fungsi Trigonometri'
        ]);        
        Lesson::create([
            'studies_id' => 1,
            'grade_specializations_id' => 3,
            'name' => 'Nilai Maks, Nilai Min, kemiringan garis singgung Dan titik belok dari fungsi Trigonometri'
        ]);
    }
}
