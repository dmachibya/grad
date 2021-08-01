<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            'Student',
            'Lecturer',
            'HOD',
            'Librarian',
            'Accountant',
            'Registrar',
            'Admin',
            'HOD GST',
            'Workshop Manager',
            'Classmaster',
            'Sport Master',
            'Cateress',
            'Waden / Matron',
            'Bursar'
        ];

        // DB::table('roles')->insert([
        //     'number'=>'1',
        //     'role_name'=>'Student',
        // ]);


        foreach ($roles as $key => $value) {

            Role::create([
                'number' => $key + 1,
                'role_name' => $value,
            ]);
        }
    }
}
