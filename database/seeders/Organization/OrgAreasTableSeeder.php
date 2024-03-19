<?php

namespace Database\Seeders\Organization;

use App\Models\User\OrgArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        OrgArea::insert([
            [
                'ward' => "mirpur 6",
                'pourosova' => "moddho badda pourosova",
                'thana' => "moddho badda thana"
            ],
            [
                'ward' => "mirpur 10",
                'pourosova' => "badda pourosova",
                'thana' => "badda thana"
            ],
            [
                'ward' => "pollobi",
                'pourosova' => "haji para pourosova",
                'thana' => "haji para thana"
            ],
            [
                'ward' => "kalshi",
                'pourosova' => "chiriakhana pourosova",
                'thana' => "chiriakhana thana"
            ],

        ]);
    }
}
