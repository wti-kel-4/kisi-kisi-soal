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
            'id' => '1',
            'name' => 'Limit Fungsi Trigonometri'
        ]);
        Lesson::create([
            'id' => '2',
            'name' => 'Limit Fungsi Menuju Ke Takhinggaan'
        ]);
        Lesson::create([
            'id' => '3',
            'name' => 'Turunan Fungsi Trigonometri'
        ]);        
        Lesson::create([
            'id' => '4',
            'name' => 'Nilai Maks, Nilai Min, kemiringan garis singgung Dan titik belok dari fungsi Trigonometri'
        ]);
        Lesson::create([
            'id' => '5',
            'name' => 'Aisatsu'
        ]);
        Lesson::create([
            'id' => '6',
            'name' => 'Tatte Kudasai'
        ]);
        Lesson::create([
            'id' => '7',
            'name' => 'Denwa bangou'
        ]);
        Lesson::create([
            'id' => '8',
            'name' => 'Nihongo de nan desuka'
        ]);
        Lesson::create([
            'id' => '9',
            'name' => 'Doko ni arimasuka'
        ]);
        Lesson::create([
            'id' => '10',
            'name' => 'Doni-san wa doko ni imasuka'
        ]);
        Lesson::create([
            'id' => '11',
            'name' => 'Tono-san no enpitsu desuka'
        ]);
        Lesson::create([
            'id' => '12',
            'name' => 'Toire wa doko desuka'
        ]);
        Lesson::create([
            'id' => '13',
            'name' => 'Tanjoubi'
        ]);
        Lesson::create([
            'id' => '14',
            'name' => 'Tesuto wa nan-youbi desuka'
        ]);

        $datas = [
            [
                'id' => '15',
                'name' => 'Isomer'
            ],
            [
                'id' => '16',
                'name' => 'Polimerisasi'
            ],
            [
                'id' => '17',
                'name' => 'Rumus molekul'
            ],
            [
                'id' => '18',
                'name' => 'Jenis reaksi senyawa hidrokarbon'
            ],
            [
                'id' => '19',
                'name' => 'Nilai Oktan'
            ],
            [
                'id' => '20',
                'name' => 'Hukum Hess'
            ],
            [
                'id' => '21',
                'name' => 'Menentukan deltaH reaksi'
            ],
            [
                'id' => '22',
                'name' => 'Energi Ikatan Rata rata'
            ],
            [
                'id' => '23',
                'name' => 'Hukum laju reaksi dan penentuan laju reaksi'
            ],
            [
                'id' => '24',
                'name' => 'Orde Reaksi'
            ],
            [
                'id' => '25',
                'name' => 'Persamaan laju reaksi'
            ],
            [
                'id' => '26',
                'name' => 'Pengaruh Suhu terhadap laju reaksi'
            ],
            [
                'id' => '27',
                'name' => 'Pegeseran  kesetimbangan'
            ],
            [
                'id' => '28',
                'name' => 'Tetapan Kesetimbangan ( Kc )'
            ],
            [
                'id' => '29',
                'name' => 'Tetapan kesetimbangan dengan konstanta berderet-deret'
            ],
            [
                'id' => '30',
                'name' => 'Hubungan antara Kp dengan Kc'
            ],
            [
                'id' => '31',
                'name' => 'Kemolaran ( M )'
            ],
            [
                'id' => '32',
                'name' => 'Hubungan Molaritas dengan % massa'
            ],
            [
                'id' => '33',
                'name' => 'Kesetimbangan tekanan parsial ( Kp )'
            ],
        ];

        foreach($datas as $data){
            Lesson::create($data);
        }
    }
}
