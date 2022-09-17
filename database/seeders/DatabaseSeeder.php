<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Anggota;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(AnggotaSeeder::class);
        User::create([
            'name'    => 'su',
            'email'    => 'su@saa.com',
            'password'    => bcrypt('secret'),
            'role'    => 'su'
        ]);

        User::create([
            'name'    => 'admin',
            'email'    => 'admin@saa.com',
            'password'    => bcrypt('secret'),
            'role'    => 'admin'
        ]);

        User::create([
            'name'    => 'teknisi',
            'email'    => 'teknisi@saa.com',
            'password'    => bcrypt('secret'),
            'role'    => 'teknisi'
        ]);

        User::create([
            'name'    => 'user',
            'email'    => 'user@saa.com',
            'password'    => bcrypt('secret'),
            'role'    => 'user'
        ]);
    }
}
