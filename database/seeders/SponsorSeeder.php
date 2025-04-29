<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entries = [
            ["Toothpick", "toothpick.png", ""],
            ["DMS", "dms.png", ""],
            ["SilverCare", "silvercare.png", ""],
            ["Dentalica", "dentalica.png", ""],
            ["BDS", "bds.png", ""],
            ["PM", "pm.png", ""],
            ["Dental Services Rapides", "dental_services_rapides.png", ""],
            ["Richa Dental Store", "richa_dental_store.png", ""],
            ["Cedra Group", "cedra_group.png", ""],
            ["Arwan", "arwan.png", ""],
            ["Confident", "confident.png", ""],
            ["Pharmakey", "pharmakey.png", ""],
            ["Therave Oral", "therave_oral.png", ""],
            ["SDRC", "sdrc.png", ""],
            ["Carol Chebli", "carol_chebli.png", ""],
            ["Signee Yourself", "signee_yourself.png", ""],
            ["USJ", "usj.png", ""],
            ["Nashawy Group", "nashawy_group.png", ""],
            ["DCP", "dcp.png", ""],
            ["AWS", "aws.png", ""],
            ["Droguerie Phonecia", "droguerie-phenicia.jpg", ""],
            ["Beirut Arab University", "beirut-arab-university.jpg", ""]
        ];

        foreach ($entries as $key => $row) {
            Sponsor::create(array(
                "name" => $row[0],
                "photo" => $row[1],
                "url" => $row[2]
            ));
        };
    }
}

