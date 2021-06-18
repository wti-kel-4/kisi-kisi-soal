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
                'id' => '1',
                'name' => 'Isomer'
            ],
            [
                'id' => '2',
                'name' => 'Polimerisasi'
            ],
            [
                'id' => '3',
                'name' => 'Rumus molekul'
            ],
            [
                'id' => '4',
                'name' => 'Jenis reaksi senyawa hidrokarbon'
            ],
            [
                'id' => '5',
                'name' => 'Nilai Oktan'
            ],
            [
                'id' => '6',
                'name' => 'Hukum Hess'
            ],
            [
                'id' => '7',
                'name' => 'Menentukan deltaH reaksi'
            ],
            [
                'id' => '8',
                'name' => 'Energi Ikatan Rata rata'
            ],
            [
                'id' => '9',
                'name' => 'Hukum laju reaksi dan penentuan laju reaksi'
            ],
            [
                'id' => '10',
                'name' => 'Orde Reaksi'
            ],
            [
                'id' => '11',
                'name' => 'Persamaan laju reaksi'
            ],
            [
                'id' => '12',
                'name' => 'Pengaruh Suhu terhadap laju reaksi'
            ],
            [
                'id' => '13',
                'name' => 'Pegeseran  kesetimbangan'
            ],
            [
                'id' => '14',
                'name' => 'Tetapan Kesetimbangan ( Kc )'
            ],
            [
                'id' => '15',
                'name' => 'Tetapan kesetimbangan dengan konstanta berderet-deret'
            ],
            [
                'id' => '16',
                'name' => 'Hubungan antara Kp dengan Kc'
            ],
            [
                'id' => '17',
                'name' => 'Kemolaran ( M )'
            ],
            [
                'id' => '18',
                'name' => 'Hubungan Molaritas dengan % massa'
            ],
            [
                'id' => '19',
                'name' => 'Kesetimbangan tekanan parsial ( Kp )'
            ],
            [
                'id' => '20',
                'name' => 'Aisatsu'
            ],
            [
                'id' => '21',
                'name' => 'Tatte Kudasai'
            ],
            [
                'id' => '22',
                'name' => 'Denwa bangou'
            ],
            [
                'id' => '23',
                'name' => 'Nihongo de nan desuka'
            ],
            [
                'id' => '24',
                'name' => 'Doko ni arimasuka'
            ],
            [
                'id' => '25',
                'name' => 'Doni-san wa doko ni imasuka'
            ],
            [
                'id' => '26',
                'name' => 'Tono-san no enpitsu desuka'
            ],
            [
                'id' => '27',
                'name' => 'Toire wa doko desuka'
            ],
            [
                'id' => '28',
                'name' => 'Tanjoubi'
            ],
            [
                'id' => '29',
                'name' => 'Tesuto wa nan-youbi desuka'
            ],
            [
                'id' => '30',
                'name' => 'Limit Fungsi Trigonometri'
            ],
            [
                'id' => '31',
                'name' => 'Limit Fungsi Menuju Ke Takhinggaan'
            ],
            [
                'id' => '32',
                'name' => 'Turunan Fungsi Trigonometri'
            ],
            [
                'id' => '33',
                'name' => 'Nilai Maks, Nilai Min, kemiringan garis singgung Dan titik belok dari fungsi Trigonometri'
            ],
        ];

        foreach($datas as $data){
            Lesson::create($data);
        }
    }
}
