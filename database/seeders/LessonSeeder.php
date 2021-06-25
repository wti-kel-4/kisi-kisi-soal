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

        $datas = [
            [
                'name' => 'Isomer'
            ],
            [
                'name' => 'Polimerisasi'
            ],
            [
                'name' => 'Rumus molekul'
            ],
            [
                'name' => 'Jenis reaksi senyawa hidrokarbon'
            ],
            [
                'name' => 'Nilai Oktan'
            ],
            [
                'name' => 'Hukum Hess'
            ],
            [
                'name' => 'Menentukan deltaH reaksi'
            ],
            [
                'name' => 'Energi Ikatan Rata rata'
            ],
            [
                'name' => 'Hukum laju reaksi dan penentuan laju reaksi'
            ],
            [
                'name' => 'Orde Reaksi'
            ],
            [
                'name' => 'Persamaan laju reaksi'
            ],
            [
                'name' => 'Pengaruh Suhu terhadap laju reaksi'
            ],
            [
                'name' => 'Pegeseran  kesetimbangan'
            ],
            [
                'name' => 'Tetapan Kesetimbangan ( Kc )'
            ],
            [
                'name' => 'Tetapan kesetimbangan dengan konstanta berderet-deret'
            ],
            [
                'name' => 'Hubungan antara Kp dengan Kc'
            ],
            [
                'name' => 'Kemolaran ( M )'
            ],
            [
                'name' => 'Hubungan Molaritas dengan % massa'
            ],
            [
                'name' => 'Kesetimbangan tekanan parsial ( Kp )'
            ],
            [
                'name' => 'Aisatsu'
            ],
            [
                'name' => 'Tatte Kudasai'
            ],
            [
                'name' => 'Denwa bangou'
            ],
            [
                'name' => 'Nihongo de nan desuka'
            ],
            [
                'name' => 'Doko ni arimasuka'
            ],
            [
                'name' => 'Doni-san wa doko ni imasuka'
            ],
            [
                'name' => 'Tono-san no enpitsu desuka'
            ],
            [
                'name' => 'Toire wa doko desuka'
            ],
            [
                'name' => 'Tanjoubi'
            ],
            [
                'name' => 'Tesuto wa nan-youbi desuka'
            ],
            [
                'name' => 'Limit Fungsi Trigonometri'
            ],
            [
                'name' => 'Limit Fungsi Menuju Ke Takhinggaan'
            ],
            [
                'name' => 'Turunan Fungsi Trigonometri'
            ],
            [
                'name' => 'Nilai Maks, Nilai Min, kemiringan garis singgung Dan titik belok dari fungsi Trigonometri'
            ],
        ];

        foreach($datas as $data){
            Lesson::create($data);
        }
    }
}
