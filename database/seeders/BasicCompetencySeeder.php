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
            'grade_specializations_id' => 1,
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 2,
            'name' => 'Menyelesaikan Masalah berkaitan dengan Limit fungsi trigonometri',
            'grade_specializations_id' => 1,
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 3,
            'name' => 'Menjelaskan dan menentukan limit di ke Takhinggaan fungsi aljabar dan fungsi Trigonometri',
            'grade_specializations_id' => 1,
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 4,
            'name' => 'Menyelesaikan masalah berkaitan dengan Eksistensi limit di ketakhinggaan fungsi Aljabar dan fungsi trigonometri',
            'grade_specializations_id' => 1,
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 5,
            'name' => 'Menggunakan prinsip turunan ke fungsi Trigonometri sederhana',
            'grade_specializations_id' => 1,
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 6,
            'name' => 'Menyelesaikan masalah yang berkaitan Dengan turunan fungsi trigonometri',
            'grade_specializations_id' => 1,
            'studies_id' => 1
        ]);
        BasicCompetency::create([
            'id' => 7,
            'name' => 'Menjelaskan keberkaitan turunan pertama Dan kedua fungsi dengan nilai maksimum Nilai minimum, selang kemonotonan Fungsi, kemiringan garis singgung serta Titik belok dan selang kecekungnan kurva Fungsi trigonometri',
            'grade_specializations_id' => 1,
            'studies_id' => 1
        ]);
        /*ditta*/
        BasicCompetency::create([
            'id' => 8,
            'name' => '3.1 Menentukan ungkapan menyapa, berpamitan, mengucapkan terima kasih, meminta maaf, meminta izin, instruksi (aisatsu) dan cara meresponnya pada teks interaksi transaksional lisan dan tulis, dengan memperhatikan unsur kebahasaan, struktur teks dan unsur budaya sesuai konteks penggunaannya',
            'grade_specializations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 9,
            'name' => '3.2 Menunjukkan ungkapan memberi dan meminta informasi terkait perkenalan diri (jikoshoukai) dan identitas diri, serta meresponsnya pada teks interaksi transaksional lisan dan tulis, dengan memperhatikan unsur kebahasaan dan struktur teks yang sesuai konteks penggunaannya',
            'grade_specializations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 10,
            'name' => '3.3 Menentukan informasi berkenaan dengan memberi dan meminta informasi terkait tanggal, bulan, dan tahun (jikan), serta meresponsnya pada teks interaksi transaksional lisan dan tulis, dengan memperhatikan fungsi sosial, struktur teks, dan unsur kebahasaan',
            'grade_specializations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 11,
            'name' => '4.1 Mendramatisasikan ungkapan menyapa, berpamitan, mengucapkan terima kasih, meminta maaf, meminta izin, instruksi (aisatsu) dan cara meresponsnya pada teks transaksional lisan dan tulis dengan memperhatikan unsur kebahasaan, struktur teks dan unsur budaya sesuai konteks penggunaannya',
            'grade_specializations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 12,
            'name' => '4.2 Mengemukakan ungkapan terkait perkenalan diri (jikoshoukai) dan identitas diri, serta meresponsnya pada teks interaksi transaksional lisan dan tulis, dengan memperhatikan unsur kebahasaan dan struktur teks yang sesuai konteks penggunaannya',
            'grade_specializations_id' => 9,
            'studies_id' => 3
        ]);
        BasicCompetency::create([
            'id' => 13,
            'name' => '4.3 Mengemukakan informasi berkenaan dengan memberi dan meminta informasi mengenai tanggal, bulan, dan tahun (jikan), serta meresponsnya pada teks interaksional lisan dan tulis, dengan memperhatikan fungsi sosial, struktur teks, dan unsur kebahasaan',
            'grade_specializations_id' => 9,
            'studies_id' => 3
        ]);
        
    }
}
