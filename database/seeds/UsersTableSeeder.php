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
            "name"=> "Chido",
            "email"=> "chido@www.com",
            "password"=> bcrypt('secret11')
        ]);

        User::create([
            "name"=> "barry",
            "email"=> "barry@www.com",
            "password"=> bcrypt('secret11')
        ]);
    }
}
