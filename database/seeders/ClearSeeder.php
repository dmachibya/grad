<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $clears = [
            'hod',
            'hod_gst',
            'workshop',
            'classmaster',
            'librarian',
            'sport',
            'cateress',
            'waden_matron',
            'registrar',
            'bursar',
        ];

        foreach ($clears as $key => $value) {
            # code...
            \App\Models\Clear::create([
                'clear_name' => $value,
            ]);
        }
    }
}
