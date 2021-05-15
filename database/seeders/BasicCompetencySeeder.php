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
        // BasicCompetency::create([
        //     'id' => 1,
        //     'name' => 'Menjelaskan dan menentukan limit fungsi trigonometri',
        //     'grade_generalizations_id' => 1,
        //     'studies_id' => 1
        // ]);
        // BasicCompetency::create([
        //     'id' => 2,
        //     'name' => 'Menyelesaikan Masalah berkaitan dengan Limit fungsi trigonometri',
        //     'grade_generalizations_id' => 1,
        //     'studies_id' => 1
        // ]);
        // BasicCompetency::create([
        //     'id' => 3,
        //     'name' => 'Menjelaskan dan menentukan limit di ke Takhinggaan fungsi aljabar dan fungsi Trigonometri',
        //     'grade_generalizations_id' => 1,
        //     'studies_id' => 2
        // ]);
        // BasicCompetency::create([
        //     'id' => 4,
        //     'name' => 'Menyelesaikan masalah berkaitan dengan Eksistensi limit di ketakhinggaan fungsi Aljabar dan fungsi trigonometri',
        //     'grade_generalizations_id' => 1,
        //     'studies_id' => 3
        // ]);
        // BasicCompetency::create([
        //     'id' => 5,
        //     'name' => 'Menggunakan prinsip turunan ke fungsi Trigonometri sederhana',
        //     'grade_generalizations_id' => 1,
        //     'studies_id' => 2
        // ]);
        // BasicCompetency::create([
        //     'id' => 6,
        //     'name' => 'Menyelesaikan masalah yang berkaitan Dengan turunan fungsi trigonometri',
        //     'grade_generalizations_id' => 1,
        //     'studies_id' => 2
        // ]);
        // BasicCompetency::create([
        //     'id' => 7,
        //     'name' => 'Menjelaskan keberkaitan turunan pertama Dan kedua fungsi dengan nilai maksimum Nilai minimum, selang kemonotonan Fungsi, kemiringan garis singgung serta Titik belok dan selang kecekungnan kurva Fungsi trigonometri',
        //     'grade_generalizations_id' => 1,
        //     'studies_id' => 3
        // ]);
        /*ditta*/
        BasicCompetency::create([
            'id' => 8,
            'name' => '3.1 Menentukan ungkapan menyapa, berpamitan, mengucapkan terima kasih, meminta maaf, meminta izin, instruksi (aisatsu) dan cara meresponnya pada teks interaksi transaksional lisan dan tulis, dengan memperhatikan unsur kebahasaan, struktur teks dan unsur budaya sesuai konteks penggunaannya',
            'grade_generalizations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 9,
            'name' => '3.2 Menunjukkan ungkapan memberi dan meminta informasi terkait perkenalan diri (jikoshoukai) dan identitas diri, serta meresponsnya pada teks interaksi transaksional lisan dan tulis, dengan memperhatikan unsur kebahasaan dan struktur teks yang sesuai konteks penggunaannya',
            'grade_generalizations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 10,
            'name' => '3.3 Menentukan informasi berkenaan dengan memberi dan meminta informasi terkait tanggal, bulan, dan tahun (jikan), serta meresponsnya pada teks interaksi transaksional lisan dan tulis, dengan memperhatikan fungsi sosial, struktur teks, dan unsur kebahasaan',
            'grade_generalizations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 11,
            'name' => '4.1 Mendramatisasikan ungkapan menyapa, berpamitan, mengucapkan terima kasih, meminta maaf, meminta izin, instruksi (aisatsu) dan cara meresponsnya pada teks transaksional lisan dan tulis dengan memperhatikan unsur kebahasaan, struktur teks dan unsur budaya sesuai konteks penggunaannya',
            'grade_generalizations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 12,
            'name' => '4.2 Mengemukakan ungkapan terkait perkenalan diri (jikoshoukai) dan identitas diri, serta meresponsnya pada teks interaksi transaksional lisan dan tulis, dengan memperhatikan unsur kebahasaan dan struktur teks yang sesuai konteks penggunaannya',
            'grade_generalizations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 13,
            'name' => '4.3 Mengemukakan informasi berkenaan dengan memberi dan meminta informasi mengenai tanggal, bulan, dan tahun (jikan), serta meresponsnya pada teks interaksional lisan dan tulis, dengan memperhatikan fungsi sosial, struktur teks, dan unsur kebahasaan',
            'grade_generalizations_id' => 9,
            'studies_id' => 3
        ]);

        $datas = [
            [
                'id' => '14',
                'name' => '3.1Menganalisisstruktur dan sifat senyawa hidrokarbon berdasarkan kekhasan atom karbon dan golongan senyawanya',
                'grade_generalizations_id' => '10',
                'studies_id' => '4'
            ],
            [
                'id' => '15',
                'name' => '3.2 Menjelaskan proses pembentukan fraksi-fraksi minyak bumi, teknik pemisahan serta kegunaannya',
                'grade_generalizations_id' => '10',
                'studies_id' => '4'
            ],
            [
                'id' => '16',
                'name' => '3.6 Menentukan H reaksi berdasarkan percobaan, hukum Hess, data perubahan entalpi pembentukan standar, dan data energi ikatan',
                'grade_generalizations_id' => '10',
                'studies_id' => '4'
            ],
            [
                'id' => '17',
                'name' => '3.7 Menentukan orde reaksi dan tetapan laju reaksi berdasarkan data hasil percobaan',
                'grade_generalizations_id' => '10',
                'studies_id' => '4'
            ],
            [
                'id' => '18',
                'name' => '3.8 Menentukan hubungan kuantitatif antara pereaksi dengan hasil reaksi dari suatu reaksi keseimbangan',
                'grade_generalizations_id' => '10',
                'studies_id' => '4'
            ],
            [
                'id' => '19',
                'name' => '3.9 Menjelaskan penerapan prinsip keseimbangan dalam kehidupan sehari-hari dan industri',
                'grade_generalizations_id' => '10',
                'studies_id' => '4'
            ],
        ];

        foreach($datas as $data){
            BasicCompetency::create($data);
        }
        
    }
}
