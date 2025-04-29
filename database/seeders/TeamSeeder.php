<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            ["Ziad Zaidan",2,"123","President","ziad-zaidan.png","","","",""],
            ["Nizar El Kadi",2,"123","Vice President","nizar-el-kadi.jpg","","","",""],
            ["Hani El Ladki",2,"123","Member","hani-ladki.jpg","","","",""],
            ["Hicham Kaaki",2,"123","Member","","","","",""],
            ["Samer El Hout",2,"123","Member","samer-hout.jpg","","","",""],
            ["Mohamad Kadouha",2,"123","Member","mohamad-kaddouha.jpg","","","",""],
            ["Walid Hatahet",2,"123","Member","walid-hatahet.jpg","","","",""],
            ["Ghina Ezzedine",2,"123","Member","ghina-ezzedine.jpg","","","",""],
            ["Zoubaida Yahfoufi",2,"123","Member","zoubaida-yahfoufi.jpg","","","",""],
            ["Yara Chidiac",2,"123","Member","yara-chidiac.jpg","","","",""],
            ["Aya Ghali",2,"123","Member","aya-ghali.jpg","","","",""],
        ];

        foreach ($entries as $key => $row) {
            Team::create(array(
                "name" => $row[0],
                "professor" => $row[1],
                "phone" => $row[2],
                "position" => $row[3],
                "photo" => $row[4],
                "x" => $row[5],
                "facebook" => $row[6],
                "instagram" => $row[7],
                "linkedin" => $row[8]
            ));
        };
    }
}
