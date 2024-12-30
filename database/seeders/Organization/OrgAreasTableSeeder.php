<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        OrgArea::truncate();
        OrgArea::insert([
            [
                'ward' => "mirpur 6",
                'pourosova' => "mirpur pourosova",
                'thana' => "mirpur thana"
            ],
            [
                'ward' => "mirpur 10",
                'pourosova' => "mirpur pourosova",
                'thana' => "mirpur thana"
            ],
            [
                'ward' => "pollobi",
                'pourosova' => "mirpur pourosova",
                'thana' => "mirpur thana"
            ],
            [
                'ward' => "kalshi",
                'pourosova' => "mirpur pourosova",
                'thana' => "mirpur thana"
            ],

        ]);
    }
}
