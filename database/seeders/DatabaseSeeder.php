<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Rekening;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
          'name' => 'aditya',
          'email' => 'aditya21@gmail.com',
          'password' => bcrypt('Aditya$1234'),
        ]);

        User::create([
            'name' => 'herpandu',
            'email' => 'herpandu26@gmail.com',
            'password' => bcrypt('Herpandu$1234'),
          ]);

          Rekening::create([
            'namaRekening' => 'Bni',
            'saldoAwal' => 15000000,
          ]);

          Rekening::create([
            'namaRekening' => 'BCA',
            'saldoAwal' => 200000000,
          ]);
    }
}
