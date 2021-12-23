<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $admin= User::create([
           'user_id'=>'admin01',
           'name'=>'admin',
           'email'=>'admin@gmail.com',
           'role_id'=>'1',
           'password'=>bcrypt('admin')
       ]);


       $user1= User::create([
        'user_id'=>'user01',
        'name'=>'user1',
        'email'=>'user1@gmail.com',
        'password'=>bcrypt('user1')
    ]);
    }
}
