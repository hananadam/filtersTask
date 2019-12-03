<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => 'admin',
            'mobile' => 1111111,
            'password' => bcrypt('Admin123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
       
    }
}
