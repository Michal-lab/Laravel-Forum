<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->updateOrInsert([
            'question_kind_id' => 1,
            'author_id' => 1,
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'tags' => 'Škoda,Superb II,BMP,2.0 TDI,EGR',
            'title' => 'Škoda Superb II, 2.0TDI, BMP - škubání motoru',
            'description' => 'Škubání motoru při rychlé akceleraci',
            'question' => 'Ahoj Všem! Vlastním auto Škoda Superb II, 2,0TDI s motorem BMP. Asi měsíc mi škube motor při rychlé akceleraci na druhý rychlostní stupeň. V servise mi řekli, že je to normální. Mě se to ale nezdá. Nemá tady někdo stejný problém?',
        ]);
        DB::table('questions')->updateOrInsert([
            'question_kind_id' => 5,
            'author_id' => 1,
        ], [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'tags' => 'Škoda,Octavia I',
            'title' => 'Škoda Octavia I - karosář',
            'description' => 'Dobrý a levný karosář',
            'question' => 'Ahoj Všem! Sháním dobrého a levného karosáře pro svou Octavii I.',
        ]);
    }
}
