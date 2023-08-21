<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Syarat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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

        User::create([
            'name' => 'Pajar Padillah',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'level' => 'admin',
            'status_konfirmasi' => 2,
            'keterangan' => 'Lengkap',
            'password' => Hash::make('12345')
        ]);
        User::create([
            'name' => 'Niken Ambarwati',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'level' => 'user',
            'status_konfirmasi' => 1,
            'keterangan' => 'Tidak Lengkap',
            'password' => Hash::make('12345')
        ]);
        User::create([
            'name' => 'Yudi Eka',
            'email' => 'pimpinan@gmail.com',
            'username' => 'pimpinan',
            'level' => 'pimpinan',
            'status_konfirmasi' => 2,
            'keterangan' => 'Lengkap',
            'password' => Hash::make('12345')
        ]);

        // for ($i = 1; $i <= 12; $i++) {
        //     Syarat::create([
        //         'file_syarat' => 'syarat.pdf'
        //     ]);
        // }
    }
}
