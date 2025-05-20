<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StudentSeeder extends Seeder
{
    public function run()
    {
        DB::table('student')->insert([
            [
                'id' => 1,
                'npm' => '22081010131',
                'nama' => 'Kalfin Shazam Music',
                'angkatan' => '2022',
                'ipk' => 4.00,
                'created_at' => Carbon::parse('2025-05-19 06:36:30'),
                'updated_at' => Carbon::parse('2025-05-19 06:37:38'),
            ],
            [
                'id' => 2,
                'npm' => '22081010194',
                'nama' => 'Irsyad Albi Anomali',
                'angkatan' => '2022',
                'ipk' => 4.00,
                'created_at' => Carbon::parse('2025-05-19 06:37:08'),
                'updated_at' => Carbon::parse('2025-05-19 06:37:08'),
            ],
        ]);
    }
}
