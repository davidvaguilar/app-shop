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
        User::create([
          'name' => 'David Villegas',
          'email' => 'david.villegas.aguilar@gmail.com',
          'password' => bcrypt('123123'),
          'admin' => true
        ]);
    }
}
