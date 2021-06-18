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
                'id' => '1',
                'name' => 'Senyawa Hidrokarbon'
            ],
            [
                'id' => '2',
                'name' => 'Minyak Bumi'
            ],
            [
                'id' => '3',
                'name' => 'Termokimia'
            ],
            [
                'id' => '4',
                'name' => 'Laju Reaksi'
            ],
            [
                'id' => '5',
                'name' => 'Kesetimbangan'
            ],
            [
                'id' => '6',
                'name' => 'Aisatsu'
            ],
            [
                'id' => '7',
                'name' => 'Jikoshoukai'
            ],
            [
                'id' => '8',
                'name' => 'Jikan'
            ],
        ];

        foreach($datas as $data){
            ScopeLesson::create($data);
        }
    }
}
