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
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Aisatsu'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Tatte Kudasai'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Denwa bangou'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Nihongo de nan desuka'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Doko ni arimasuka'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Doni-san wa doko ni imasuka'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Tono-san no enpitsu desuka'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Toire wa doko desuka'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Tanjoubi'
        ]);
        Lesson::create([
            'studies_id' => 3,
            'grade_specializations_id' => 9,
            'name' => 'Tesuto wa nan-youbi desuka'
        ]);
    }
}
