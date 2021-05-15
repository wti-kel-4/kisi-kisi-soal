<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = [
        'log_activity_users',
        'question_cards',
        'question_card_headers',
        'question_grids',
        'question_grid_headers',
        'basic_competencies',
        'study_lesson_scope_lesson',
        'scope_lessons',
        'teacher_study',
        'teacher_grade_generalization',
        'lessons',
        'studies',
        'grades',
        'admins',
        'grade_generalizations',
        'users',
        'teachers',
        'profiles'  
    ];

    public function run()
    {
        Model::unguard();
        foreach($this->toTruncate as $table) {
            DB::table($table)->delete();
        }
        Model::reguard();
        
        $this->call([
            TeacherSeeder::class,
            GradeGeneralizationSeeder::class,
            GradeSeeder::class,
            StudySeeder::class,
            ScopeLessonSeeder::class,
            LessonSeeder::class,
            StudyLessonScopeLessonSeeder::class,
            ProfileSeeder::class,
            BasicCompetencySeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            TeacherGradeGeneralizationSeeder::class,
            TeacherStudySeeder::class,
            // QuestionGridSeeder::class,
            // QuestionCardSeeder::class,
        ]);
    }
}
