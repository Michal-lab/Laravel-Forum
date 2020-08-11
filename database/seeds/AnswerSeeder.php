<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->updateOrInsert([
            'question_id' => 1,
            'author_id' => 1,
        ], [
            'answer' => 'bla bla bla bla',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('answers')->updateOrInsert([
            'question_id' => 1,
            'author_id' => 3,
        ], [
            'answer' => 'bla bla bla bla',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('answers')->updateOrInsert([
            'question_id' => 1,
            'author_id' => 4,
        ], [
            'answer' => 'bla bla bla bla',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
