<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            ["Wassim Tair", "admin@beirut-dentists-league.com", '$2y$12$kwWy3eZyc5oIR.ZmN7b2LueC1a76DNZRiSmNAuW8rMLCk1PR8zDnO'],
        ];

        foreach ($entries as $key => $row) {
            User::create(array(
                "name" => $row[0],
                "email" => $row[1],
                "password" => $row[2]
            ));
        };
    }
}
