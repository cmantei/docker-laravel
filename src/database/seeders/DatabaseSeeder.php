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

        User::factory()->create([
            'name' => 'Cliente',
            'email' => 'cliente@example.com',
            'password' => 'abc123.',
            'role' => 'cliente',
        ]);

        User::factory(10)->create();
        Cita::factory(10)->create();

        Coche::factory()->create([
            'marca' => 'Alfa Romeo',
            'modelo' => 'Giulia',
            'matricula' => 'ZXC-234',
            'cliente_id' => '2'
        ]);

        Coche::factory()->create([
            'marca' => 'Toyota',
            'modelo' => 'Yaris',
            'matricula' => 'JMK-101',
            'cliente_id' => '2'
        ]);

        Coche::factory()->create([
            'marca' => 'Seat',
            'modelo' => 'Ibiza',
            'matricula' => 'JKL-765',
            'cliente_id' => '2'
        ]);

        Coche::factory()->create([
            'marca' => 'Peugeot',
            'modelo' => '308',
            'matricula' => 'RWG-932',
            'cliente_id' => '3'
        ]);

        Coche::factory()->create([
            'marca' => 'Opel',
            'modelo' => 'Astra',
            'matricula' => 'WWW-333',
            'cliente_id' => '3'
        ]);

        Coche::factory()->create([
            'marca' => 'Subaru',
            'modelo' => 'Impreza',
            'matricula' => 'YTR-842',
            'cliente_id' => '4'
        ]);
    }
}
