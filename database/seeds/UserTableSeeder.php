<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'MasterYodA',
            'email' => 'beachman19@gmail.com',
            'picture' => '123',
            'password' => '$2y$10$7G9SgeK9nO8JcV9WgfZ8/.5s9KUvWsyx2eS.2UeKMmYpA/ZBJYyEi',
            'global_admin' => true,
            'confirmed' => true
        ]);
    }
}
