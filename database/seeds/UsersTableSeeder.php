<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'bert',
            'email' => 'bert@bert.nl',
            'password' => bcrypt('password')
        ]);
    }
}
