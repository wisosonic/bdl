<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            ["27th annual scientific day","27","Beirut","0","21 April 2024","Beirut Arab University","cover1.jpg", "by Beirut Dentists's League"],
            ["28th annual scientific day","28","Beirut","1","25 May 2025","Beirut Arab University","cover2.jpg", ""],
        ];

        foreach ($entries as $key => $row) {
            Event::create(array(
                "title" => $row[0],
                "edition" => $row[1],
                "city" => $row[2],
                "registering" => $row[3],
                "date" => $row[4],
                "venue" => $row[5],
                "cover" => $row[6],
                "subtitle" => $row[7],
            ));
        };
    }
}