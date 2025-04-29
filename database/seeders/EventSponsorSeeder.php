<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;

class EventSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Event::all() as $key => $event) {
            $event->sponsors()->detach();
        }

        $entries = [
            [1, 1, 1],
            [1, 2, 4],
            [1, 3, 6],
            [1, 4, 3],
            [1, 5, 2],
            [1, 6, 3],
            [1, 7, 2],
            [1, 8, 3],
            [1, 9, 3],
            [1, 10, 3],
            [1, 11, 4],
            [1, 12, 4],
            [1, 13, 4],
            [1, 14, 5],
            [1, 15, 6],
            [1, 16, 6],
            [1, 17, 6],
            [1, 18, 3],
            [1, 19, 6],
            [1, 20, 4],

            [2, 1, 1],
            [2, 5, 2],
            [2, 7, 2],
            [2, 22, 2],
            [2, 6, 3],
            [2, 8, 3],
            [2, 18, 3],
            [2, 11, 3],
            [2, 15, 3],
            [2, 21, 3],
        ];
        
        foreach ($entries as $key => $row) {
            $event = Event::find($row[0]);
            $event->sponsors()->attach($row[1], ['platinum' => $row[2]]);
        };

    }
}