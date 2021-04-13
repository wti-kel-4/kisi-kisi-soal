<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionCard;

class QuestionCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	QuestionCard::create([
			"question_grids_id" => 1,
			"number" => 1,
			"reference_book_1" => "Yudisthira, kelas XII IPA, S N Sharma",
			"reference_book_2" => "LKS 3a Kharisma th 2019",
			"question" => "Nilai dari lim  x2 – 3x + 5 , adalah ",
			"key" => "a",
			"answer_a" => "3",
			"answer_b" => "2",
			"answer_c" => "1",
			"answer_d" => "0",
			"answer_e" => "-1",
		]);
		QuestionCard::create([
			"question_grids_id" => 1,
			"number" => 2,
			"reference_book_1" => "Yudisthira, kelas XII IPA, S N Sharma",
			"reference_book_2" => "LKS 3a Kharisma th 2019",
			"question" => "Nilai dari lim  sin x + cos x , adalah ",
			"key" => "d",
			"answer_a" => "0",
			"answer_b" => "1/2v2",
			"answer_c" => "1",
			"answer_d" => "v2",
			"answer_e" => "2v2",
		]);
		QuestionCard::create([
			"question_grids_id" => 1,
			"number" => 3,
			"reference_book_1" => "S.N. Sharma, Yudisthira, Kelas XII IPA",
			"reference_book_2" => "LKS Kharisma Kelas XII IPA 2019",
			"question" => "Diketahui f(x) = 3x + 6 dan g(x) = 3, maka nilai lim  f(x)/g(x), adalah",
			"key" => "e",
			"answer_a" => "-2",
			"answer_b" => "-1",
			"answer_c" => "0",
			"answer_d" => "1",
			"answer_e" => "2",
		]);
		QuestionCard::create([
			"question_grids_id" => 1,
			"number" => 4,
			"reference_book_1" => "S.N. Sharma, Yudisthira",
			"reference_book_2" => "LKS Kharisma Kelas XII IPA 2019",
			"question" => "Diketahui f(x) = 2 Sinx  dan g(x) = -cos x,maka lim f(x)–g(x) , adalah ",
			"key" => "d",
			"answer_a" => "-1",
			"answer_b" => "0",
			"answer_c" => "1/2",
			"answer_d" => "1",
			"answer_e" => "v2",
		]);
		QuestionCard::create([
			"question_grids_id" => 1,
			"number" => 5,
			"reference_book_1" => "S.N. Sharma, Yudisthira",
			"reference_book_2" => "LKS Kharisma Kelas XII IPA 2019",
			"question" => "Nilai dari lim (x2 - 4x + 12) / (x-6) , adalah ",
			"key" => "a",
			"answer_a" => "-2",
			"answer_b" => "-1",
			"answer_c" => "0",
			"answer_d" => "1",
			"answer_e" => "2",
		]);
		QuestionCard::create([
			"question_grids_id" => 1,
			"number" => 6,
			"reference_book_1" => "S.N. Sharma, Yudisthira",
			"reference_book_2" => "LKS Kharisma Kelas XII IPA 2019",
			"question" => "Nilai dari lim cos 2x / sinx, adalah ",
			"key" => "a",
			"answer_a" => "~",
			"answer_b" => "1",
			"answer_c" => "0",
			"answer_d" => "1/2",
			"answer_e" => "-1",
		]);
    }
}
