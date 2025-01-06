<?php

namespace Database\Seeders\Notification;

use App\Models\Notification\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification::truncate();
        // $report_info_id = 1;
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Notification::create([
                    'user_id' => 8 + $i,
                    'unit_id' => $i,
                    'ward_id' => 1,
                    'thana_id' => 1,
                    'city_id' => 1,
                    'title' => 10 * rand(1, 5),
                    'description' => "Description of Notification {$i} {$j}",
                    'unit_expense_targets_amount' => null,

                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
            }
        }
    }
}
