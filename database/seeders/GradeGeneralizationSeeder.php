<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeGeneralization;

class GradeGeneralizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeGeneralization::create([
            'id' => 1,
            'name' => 'XII MIPA Efektif'
        ]);
        GradeGeneralization::create([
            'id' => 2,
            'name' => 'XII MIPA'
        ]);
        GradeGeneralization::create([
            'id' => 3,
            'name' => 'XII IPS'
        ]);
        GradeGeneralization::create([
            'id' => 4,
            'name' => 'XI MIPA Efektif'
        ]);
        GradeGeneralization::create([
            'id' => 5,
            'name' => 'XI MIPA'
        ]);
        GradeGeneralization::create([
            'id' => 6,
            'name' => 'XI IPS' 
        ]);
        GradeGeneralization::create([
            'id' => 7,
            'name' => 'X MIPA Efektif' 
        ]);
        GradeGeneralization::create([
            'id' => 8,
            'name' => 'X MIPA'
        ]);
        GradeGeneralization::create([
            'id' => 9,
            'name' => 'X IPS' 
        ]);
        GradeGeneralization::create([
            'id' => 10,
            'name' => 'XI'
        ]);
        GradeGeneralization::create([
            'id' => 11,
            'name' => 'X'
        ]);
    }
}
