<?php

namespace Database\Seeders;

use App\Models\ScopeLesson;
use Illuminate\Database\Seeder;

class ScopeLessonSeeder extends Seeder
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
                'name' => 'Senyawa Hidrokarbon'
            ],
            [
                'name' => 'Minyak Bumi'
            ],
            [
                'name' => 'Termokimia'
            ],
            [
                'name' => 'Laju Reaksi'
            ],
            [
                'name' => 'Kesetimbangan'
            ],
            [
                'name' => 'Aisatsu'
            ],
            [
                'name' => 'Jikoshoukai'
            ],
            [
                'name' => 'Jikan'
            ],
        ];

        foreach($datas as $data){
            ScopeLesson::create($data);
        }
    }
}
