<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LogActivity;

class LogActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LogActivity::create([
        	'question_grids_id' => '1',
        	'question_cards_id' => '1',
        	'action' => 'make',
        	'users_id' => '1',
            'used_for_users_id' => '1',
        ]);
    }
}
