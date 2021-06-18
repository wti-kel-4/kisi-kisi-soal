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
            'id' => 1,
            'name' => 'Bahasa Indonesia',
            'grade_generalizations_id' => 2
        ]);
        Study::create([
            'id' => 2,
            'name' => 'Matematika (P)',
            'grade_generalizations_id' => 2
        ]);
        Study::create([
            'id' => 3,
            'name' => 'Bahasa dan Sastra Jepang',
            'grade_generalizations_id' => 11
        ]);
        Study::create([
            'id' => 4,
            'name' => 'Kimia',
            'grade_generalizations_id' => 10
        ]);
        Study::create([
            'id' => 5,
            'name' => 'Bahasa Jepang',
            'grade_generalizations_id' => 11
        ]);
    }
}
