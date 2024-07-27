<?php

namespace Database\Seeders;

use App\Models\Pemilih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pemilih::factory(100)->create();
    }
}
