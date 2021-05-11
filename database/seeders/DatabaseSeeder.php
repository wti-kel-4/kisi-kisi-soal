<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TeacherSeeder::class,
            GradeGeneralizationSeeder::class,
            GradeSeeder::class,
            StudySeeder::class,
            // LessonSeeder::class,
            ProfileSeeder::class,
            // BasicCompetencySeeder::class,
            // QuestionGridSeeder::class,
            // QuestionCardSeeder::class,            
            UserSeeder::class,
            AdminSeeder::class,
            // TeacherGradeGeneralizationSeeder::class,
        ]);
    }
}
