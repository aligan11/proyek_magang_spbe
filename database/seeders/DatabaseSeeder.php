<?php

namespace Database\Seeders;

use App\Models\Jenis_layanan_spbe;
use App\Models\Kebutuhan_layanan_spbe;
use App\Models\Layanan_spbe;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(
            [
                adminSeeder::class,
                ServiceSeeder::class,
                TicketSeeder::class,
                jenisLayananSeeder::class,
                kebutuhan_layanan_seeder::class,
                layanan_spbe_seeder::class,
            ]
        );
    }
}
