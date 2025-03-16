<?php

namespace Database\Seeders\User;

use App\Models\User\ReportUploader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportUploadersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportUploader::truncate();
        ReportUploader::insert([
            [
                'org_type' => 'city',
                'org_id' => 1,     //city_id
                'user_id' => 3,
                'is_active' => true,
            ],
            [
                'org_type' => 'city',
                'org_id' => 1,     //city_id
                'user_id' => 4,
                'is_active' => true,
            ],
            [
                'org_type' => 'thana',
                'org_id' => 1,     //thana_id
                'user_id' => 5,
                'is_active' => true,
            ],
            [
                'org_type' => 'thana',
                'org_id' => 1,     //thana_id
                'user_id' => 6,
                'is_active' => false,
            ],
            [
                'org_type' => 'ward',
                'org_id' => 1,     //ward_id
                'user_id' => 7,
                'is_active' => true,
            ],
            [
                'org_type' => 'ward',
                'org_id' => 1,     //ward_id
                'user_id' => 8,
                'is_active' => false,
            ],
            [
                'org_type' => 'unit',
                'org_id' => 1,     //unit_id
                'user_id' => 9,
                'is_active' => true,
            ],
            [
                'org_type' => 'unit',
                'org_id' => 1,     //unit_id
                'user_id' => 10,
                'is_active' => false,
            ],
            [
                'org_type' => 'unit',
                'org_id' => 1,     //unit_id
                'user_id' => 11,
                'is_active' => false,
            ],
            [
                'org_type' => 'unit',
                'org_id' => 1,     //unit_id
                'user_id' => 12,
                'is_active' => false,
            ],
        ]);
    }
}
