<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Timeslot;

class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            ["Registration", "", "8:00 AM", "9:00 AM", 1, "break", 1],
            ["Opening Ceremony", "With a grand opening, we welcome new beginnings, new possibilities, and new memories", "9:00 AM", "10:00 AM", 1, "break", 1],
            ["", "", "10:00 AM", "10:45 AM", 1, "lecture", 1],
            ["", "", "10:45 AM", "11:30 AM", 1, "lecture", 1],
            ["", "", "11:30 AM", "12:15 PM", 1, "lecture", 1],
            ["Discussion", "The best doctors give the least medicine.-Benjamin Franklin", "12:15 PM", "12:30 PM", 1, "break", 1],
            ["Coffee Break", "Rise and grind, it's coffee time!", "12:30 PM", "12:45 PM", 1, "break", 1],
            ["", "", "12:45 PM", "13:00 PM", 1, "lecture", 1],
            ["", "", "13:00 PM", "13:15 PM", 1, "lecture", 1],
            ["", "", "13:15 PM", "13:30 PM", 1, "lecture", 1],
            ["Lunch Break", "People who say they're too busy to have lunch have a false impression of their own importance.-John Howard", "13:30 PM", "14:30 PM", 1, "break", 1],
            ["", "", "14:30 PM", "14:45 PM", 1, "lecture", 1],
            ["", "", "14:45 PM", "15:30 PM", 1, "lecture", 1],
            ["", "", "15:30 PM", "16:15 PM", 1, "lecture", 1],
            ["Discussion", "Do as much as possible for the patient, and as little as possible to the patient.-Sigmund Freud", "16:15 PM", "16:30 PM", 1, "break", 1],
            ["", "", "16:30 PM", "16:45 PM", 1, "lecture", 1],

            ["Registration", "", "8:00 AM", "9:00 AM", 1, "break", 2],
            ["Opening Ceremony", "With a grand opening, we welcome new beginnings, new possibilities, and new memories", "9:00 AM", "10:00 AM", 1, "break", 2],
            ["", "", "10:00 AM", "10:45 AM", 1, "lecture", 2],
            ["", "", "10:45 AM", "11:30 AM", 1, "lecture", 2],
            ["Coffee Break", "Rise and grind, it's coffee time!", "11:30 AM", "12:00 PM", 1, "break", 2],
            ["", "", "12:00 PM", "12:40 PM", 1, "lecture", 2],
            ["", "", "12:45 PM", "13:30 PM", 1, "lecture", 2],
            ["", "", "13:30 PM", "14:00 PM", 1, "lecture", 2],
            ["Launch", "People who say they're too busy to have lunch have a false impression of their own importance.-John Howard", "14:00 AM", "15:00 PM", 1, "break", 2],
        ];

        foreach ($entries as $key => $row) {
            Timeslot::create(array(
                "title" => $row[0],
                "quote" => $row[1],
                "start" => $row[2],
                "end" => $row[3],
                "day" => $row[4],
                "type" => $row[5],
                "event_id" => $row[6]
            ));
        };
    }
}


