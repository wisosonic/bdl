<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Speaker;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            ["4","Georges Tawil", "Periodontology", "1.png"],
            ["2", "Maroun Ghaleb", "Aesthetic and Prosthetic Dentistry", "2.png"],
            ["3", "Yasser Mohamed Aly", "Fixed Prosthodontics", "3.png"],
            ["0", "Wael Bizri", "Toothpick", "11.png"],
            ["2", "Raneem Saudi", "Operative and Esthetic Dentistry", "9.png"],
            ["1", "Fadi Balhawan", "Artist", "5.png"],
            ["2", "Faouzi Naous", "Oral and Dental Surgery", "6.png"],
            ["4", "Edmond Koyess", "Endodontics", "7.png"],
            ["4", "Nouhad Rizk", "Fixed Prosthodontics", "8.png"],
            ["2", "Ali Al Housseini", "Fixed Prosthodontics", "10.png"],

            ["2", "Alexandar Khairallah", "Oral Med. and Maxillofacial Radiology", "alexander-khairallah.jpg"],
            ["2", "Tarek Khawli", "Digital Cosmetic Dentistry", "tarek-khawli.jpg"],
            ["4", "Hani Tohme", "Prosthodontist and Implantologist", "hani-tohme.jpg"],
            ["3", "Carla Zogheib", "Endodontistry", "carla-zogheib.jpg"],
            ["4", "Jamal Honeineh", "Operative Dentistry", "jamal-honeineh.jpg"],
        ];

        foreach ($entries as $key => $row) {
            Speaker::create(array(
                "professor" => $row[0],
                "name" => $row[1],
                "speciality" => $row[2],
                "photo" => $row[3]
            ));
        };
    }
}

