<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KisiKisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kisi_kisi')->insert([
            [
                'lesson_id' => '1',
                'basic_competency_id' => '1',
                'question_grids_id' => '1',
                'lingkup_materi' => '1',
                'materi' => '1',
                'level_kognitif' => '1',
                'indicator' => '1',
                'form' => 'PG',
                'number' => '1',
                'created_at' => '2021-03-17 15:06:46',
                'updated_at' => '2021-03-17 15:06:46',
            ],
            

        ]);
    }
}
