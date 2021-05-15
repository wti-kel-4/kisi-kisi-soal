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
            ]
        ];

        foreach($datas as $data){
            ScopeLesson::create($data);
        }
    }
}