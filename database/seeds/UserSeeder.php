<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::updateOrCreate([
            'name' => 'admin',
            'email' => 'admin@localhost.cz',
        ], [
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),            
        ]);
        $admin->assignRoles(['admin', 'user']);

        $user = User::updateOrCreate([
            'name' => 'Filip Špaček',
            'email' => 'filas158@seznam.cz',
        ], [
            'password' => Hash::make('123456789'),
            'email_verified_at' => Carbon::now(),            
        ]);
        $user->assignRoles(['user']);

        $user = User::updateOrCreate([
            'name' => 'Test Testovič',
            'email' => 'test1@seznam.cz',
        ], [
            'password' => Hash::make('123456789'),
            'email_verified_at' => Carbon::now(),            
        ]);
        $user->assignRoles(['user']);

        $user = User::updateOrCreate([
            'name' => 'Test Testovič 2',
            'email' => 'test2@seznam.cz',
        ], [
            'password' => Hash::make('123456789'),
            'email_verified_at' => Carbon::now(),            
        ]);
        $user->assignRoles(['user']);
    }
}
