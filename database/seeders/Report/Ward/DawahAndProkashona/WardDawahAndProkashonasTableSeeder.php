<?php

namespace Database\Seeders\Report\Ward\DawahAndProkashona;

use App\Models\Report\Ward\DawahAndProkashona\WardDawahAndProkashona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDawahAndProkashonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDawahAndProkashona::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDawahAndProkashona::create([
                    'report_info_id' => $report_info_id,
                    'total_pathagar' => rand(1, 10),
                    'total_pathagar_increase' => rand(1, 10),

                    'books_in_pathagar' => rand(1, 10),
                    'books_in_pathagar_increase' => rand(1, 10),

                    'book_distribution' => rand(1, 10),
                    'book_distribution_increase' => rand(1, 10),

                    'unit_book_distribution_center' => rand(1, 10),
                    'unit_book_distribution_center_increase' => rand(1, 10),

                    'unit_book_distribution' => rand(1, 10),
                    'unit_book_distribution_increase' => rand(1, 10),

                    'ward_book_sales_center' => rand(1, 10),
                    'ward_book_sales_center_increase' => rand(1, 10),

                    'ward_book_sales' => rand(1, 10),
                    'ward_book_sales_increase' => rand(1, 10),

                    'soft_copy_book_distribution' => rand(1, 10),
                    'soft_copy_book_distribution_increase' => rand(1, 10),

                    'dawat_link_distribution' => rand(1, 10),
                    'dawat_link_distribution_increase' => rand(1, 10),

                    'sonar_bangla' => rand(1, 10),
                    'sonar_bangla_increase' => rand(1, 10),

                    'songram' => rand(1, 10),
                    'songram_increase' => rand(1, 10),

                    'prithibi' => rand(1, 10),
                    'prithibi_increase' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
