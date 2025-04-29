<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Lecture;
use App\Models\Member;
use App\Models\Speaker;
use App\Models\Sponsor;
use App\Models\Team;
use App\Models\Timeslot;

use Illuminate\Support\Facades\Schema;
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
        Schema::disableForeignKeyConstraints();

        User::truncate();
        Lecture::truncate();
        Timeslot::truncate();
        Speaker::truncate();
        Sponsor::truncate();
        Event::truncate();
        Member::truncate();
        Team::truncate();
        
        $this->call([
            UserSeeder::class,
            EventSeeder::class,
            SponsorSeeder::class,
            EventSponsorSeeder::class,
            SpeakerSeeder::class,
            TimeslotSeeder::class,
            LectureSeeder::class,
            TeamSeeder::class,
            MemberSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
