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
            'name' => 'XII MIPA Efektif'
        ]);
        GradeGeneralization::create([
            'name' => 'XII MIPA'
        ]);
        GradeGeneralization::create([
            'name' => 'XII IPS'
        ]);
        GradeGeneralization::create([
            'name' => 'XI MIPA Efektif'
        ]);
        GradeGeneralization::create([
            'name' => 'XI MIPA'
        ]);
        GradeGeneralization::create([
            'name' => 'XI IPS' 
        ]);
        GradeGeneralization::create([
            'name' => 'X MIPA Efektif' 
        ]);
        GradeGeneralization::create([
            'name' => 'X MIPA'
        ]);
        GradeGeneralization::create([
            'name' => 'X IPS' 
        ]);
        GradeGeneralization::create([
            'name' => 'XI'
        ]);
        GradeGeneralization::create([
            'name' => 'X'
        ]);
        GradeGeneralization::create([
            'name' => 'XII'
        ]);
    }
}
