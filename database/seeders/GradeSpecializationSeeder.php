<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeSpecialization;

class GradeSpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeSpecialization::create([
            'id' => 1,
            'name' => 'XII MIPA Efektif'
        ]);
        GradeSpecialization::create([
            'id' => 2,
            'name' => 'XII MIPA'
        ]);
        GradeSpecialization::create([
            'id' => 3,
            'name' => 'XII IPS'
        ]);
        GradeSpecialization::create([
            'id' => 4,
            'name' => 'XI MIPA Efektif'
        ]);
        GradeSpecialization::create([
            'id' => 5,
            'name' => 'XI MIPA'
        ]);
        GradeSpecialization::create([
            'id' => 6,
            'name' => 'XI IPS' 
        ]);
        GradeSpecialization::create([
            'id' => 7,
            'name' => 'X MIPA Efektif' 
        ]);
        GradeSpecialization::create([
            'id' => 8,
            'name' => 'X MIPA'
        ]);
        GradeSpecialization::create([
            'id' => 9,
            'name' => 'X IPS' 
        ]);
    }
}
