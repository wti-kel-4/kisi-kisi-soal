<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BasicCompetency;

class BasicCompetencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BasicCompetency::create([
            'id' => 1,
            'name' => 'Menjelaskan dan menentukan limit fungsi trigonometri',
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 2,
            'name' => 'Menyelesaikan Masalah berkaitan dengan Limit fungsi trigonometri',
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 3,
            'name' => 'Menjelaskan dan menentukan limit di ke Takhinggaan fungsi aljabar dan fungsi Trigonometri',
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 4,
            'name' => 'Menyelesaikan masalah berkaitan dengan Eksistensi limit di ketakhinggaan fungsi Aljabar dan fungsi trigonometri',
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 5,
            'name' => 'Menggunakan prinsip turunan ke fungsi Trigonometri sederhana',
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 6,
            'name' => 'Menyelesaikan masalah yang berkaitan Dengan turunan fungsi trigonometri',
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 7,
            'name' => 'Menjelaskan keberkaitan turunan pertama Dan kedua fungsi dengan nilai maksimum Nilai minimum, selang kemonotonan Fungsi, kemiringan garis singgung serta Titik belok dan selang kecekungnan kurva Fungsi trigonometri',
            'studies_id' => 1
        ]);
    }
}
