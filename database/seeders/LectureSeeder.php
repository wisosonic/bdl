<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Lecture;

class LectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            ["Implants in fresh extraction molar sites: keys to success", 1, 3],
            ["Mastering the Smile: Latest Techniques in Composites Veneers", 2, 4],
            ["Indirect ceramic restoration (Past & Present)", 3, 5],
            ["Revolutionizing Healthcare: Ai Innovations and Disruptive Financial Solutions", 4, 8],
            ["Update in Teeth Whitening Procedure", 5, 9],
            ["Exploring the art Calligraphy after years in sales", 6, 10],
            ["Selection Criteria for Immediate Implant Placement", 7, 12],
            ["Bioceramic in Endodontics: a break through or another adventure", 8, 13],
            ["Occlusion over implant supported restaurations: Considerations, applications and concept", 9, 14],
            ["If you are not digital, you are not eligible !", 10, 16],
            
            ["From Radiological guide to Surgical guide.. What do you need to know ?", 11, 19],
            ["Digital Dentistry. Where we are and where to go", 12, 20],
            ["Elevating Implant Outcomes: A Digital Approach to Aesthetic Zone and Full-Arch Challenges", 13, 22],
            ["Calcium Cilicate Sealers.. An efficient weapon againt Endodontrics", 14, 23],
            ["Direct Anterior Resin Composite Restorations", 15, 24],
        ];

        foreach ($entries as $key => $row) {
            Lecture::create(array(
                "title" => $row[0],
                "speaker_id" => $row[1],
                "timeslot_id" => $row[2]
            ));
        };
    }
}
