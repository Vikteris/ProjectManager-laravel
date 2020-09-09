<?php

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
        DB::table('users')->insert([
            'name' => 'Vikas',
            'email' => 'vikter@inbox.lt',
            'password' => Hash::make('darbas'),
        ]);    }
}
