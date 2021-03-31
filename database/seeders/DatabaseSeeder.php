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
            BasicCompetencySeeder::class,
            DepartmentSeeder::class,
            JobSeeder::class,
            EmployeeSeeder::class,
            TeacherSeeder::class,
            GradeSeeder::class,
            LessonSeeder::class,
            ProfileSeeder::class,
            QuestionCardSeeder::class,
            QuestionGridSeeder::class,
            StudySeeder::class,
            UserSeeder::class
        ]);
    }
}
