<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'role' => 7,
            'password' => Hash::make("1234user"),
        ]);
        // DB::table('roles')->insert([
        //     'number'=>'1',
        //     'role_name'=>'Student',
        // ]);
    }
}
