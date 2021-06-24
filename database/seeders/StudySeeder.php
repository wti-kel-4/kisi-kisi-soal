<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Study;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Study::create([
            'name' => 'Bahasa Indonesia',
            'grade_generalizations_id' => 2
        ]);
        Study::create([
            'name' => 'Matematika (P)',
            'grade_generalizations_id' => 2
        ]);
        Study::create([
            'name' => 'Bahasa dan Sastra Jepang',
            'grade_generalizations_id' => 11
        ]);
        Study::create([
            'name' => 'Kimia',
            'grade_generalizations_id' => 10
        ]);
        Study::create([
            'name' => 'Bahasa Jepang',
            'grade_generalizations_id' => 11
        ]);
    }
}
