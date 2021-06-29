<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
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
        //
        User::create([
            'name'=>'Admin',
            'email'=>'admin@email.com',
            'role'=>7,
            'password'=> Hash::make("1234user"),
        ]);

    }
}
