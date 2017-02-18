<?php

use Illuminate\Database\Seeder;
use App\User;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
    		'name'=>'ADMIN',
    		'permission'=>'Admin',
    		'email'=>'admin@gmail.com',
    		'password'=> bcrypt('admin12345'),
    		]);
    }
}
