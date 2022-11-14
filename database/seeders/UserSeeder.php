<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'last_name' => 'SÉGALEN',
                'first_name' => 'Thomas',
                'email' => 'thomas.segalen@gmail.com',
                'password' => Hash::make('thomassegalen'),
                'avatar' => fake()->imageUrl(),
                'group_id' => 1,
                'is_admin' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'last_name' => 'DUPONT',
                'first_name' => 'Jean',
                'email' => 'jean.dupont@gmail.com',
                'password' => Hash::make('jeandupont'),
                'avatar' => fake()->imageUrl(),
                'group_id' => 1,
                'is_admin' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
        ]);
    }
}
