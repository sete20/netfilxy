<?php

use Illuminate\Database\Seeder;
use App\user;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = user::create([
        'name'=>'abdelrhman',
        'email'=>"Abdelrhman@gmail.com",
        'password'=>bcrypt('123456789')
       ]);
       $user->AttachRole('super_admin');
       $user->save();
    }
}
