<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggotas')->insert([
            'name' => Str::random(10),
            'nim' => Str::random(10),
            'prodi' => Str::random(10),
            'nim' => Str::random(10),
        ]);
    }
}
