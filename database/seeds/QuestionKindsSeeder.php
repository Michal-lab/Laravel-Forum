<?php

use Illuminate\Database\Seeder;

class QuestionKindsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_kinds')->updateOrInsert([
            'code' => 'Motor'
        ], [
            'description' => 'Diskuze týkající se motorů automobilů'
        ]);
        DB::table('question_kinds')->updateOrInsert([
            'code' => 'Převodovka'
        ], [
            'description' => 'Diskuze týkající se převodovek automobilů'
        ]);
        DB::table('question_kinds')->updateOrInsert([
            'code' => 'Elektroinstalace'
        ], [
            'description' => 'Diskuze týkající se elektroinstalace automobilů'
        ]);
        DB::table('question_kinds')->updateOrInsert([
            'code' => 'Interiér'
        ], [
            'description' => 'Diskuze týkající se interieru automobilů'
        ]);
        DB::table('question_kinds')->updateOrInsert([
            'code' => 'Karoserie'
        ], [
            'description' => 'Diskuze týkající se karoserie automobilů'
        ]);
    }
}
