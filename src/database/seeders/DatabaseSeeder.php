<?php

namespace Database\Seeders;
use App\Models\Cita;
use App\Models\User;
use App\Models\Coche;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => 'abc123.',
            'role' => 'taller',
        ]);

        User::factory(10)->create();
        Cita::factory(10)->create();

        Coche::factory()->create([
            'marca' => 'Alfa Romeo',
            'modelo' => 'Giulia',
            'matricula' => 'ZXC-234',
            'cliente_id' => '2'
        ]);
    }
}
