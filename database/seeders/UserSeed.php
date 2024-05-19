<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create($this->userData());
        // User::factory()->count(20)->create();
    }
    public function userData()
    {
        return [
            'name' => "toma",
            'email' => 'mohamed@elhossiny.net',
            'password' => Hash::make("123"),

        ];
    }
}
