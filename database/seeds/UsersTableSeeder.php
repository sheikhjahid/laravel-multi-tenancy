<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'jahid',
        	'email' => 'jahid@itobuz.com',
        	'password' => Hash::make('123456')

        ]);
    }
}
