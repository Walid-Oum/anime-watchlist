<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Anime;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
        ]);

        Anime::create([
            'title' => 'Attack on Titan',
            'description' => 'Mensen leven achter muren om zich te beschermen tegen titanen.',
            'episodes' => 87,
            'release_year' => 2013,
        ]);

        Anime::create([
            'title' => 'Frieren',
            'description' => 'Een elf-magiër reist verder na het einde van haar grote avontuur.',
            'episodes' => 28,
            'release_year' => 2023,
        ]);

    }
}
