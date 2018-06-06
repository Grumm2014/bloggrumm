<?php

use Illuminate\Database\Seeder;

class UsersStatusTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alfa',
            'email' => 'alfa@alfa.com',
            'password' => bcrypt('alfa123'),
            'status' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Betta',
            'email' => 'betta@betta.com',
            'password' => bcrypt('betta123'),
            'status' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Gamma',
            'email' => 'gamma@gamma.com',
            'password' => bcrypt('gamma123'),
            'status' => 'banned',
        ]);
    }
}
