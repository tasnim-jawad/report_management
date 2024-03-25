<?php

namespace Database\Seeders\Report\DawahAndProkashona;

use App\Models\Report\DawahAndProkashona\DawahAndProkashona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DawahAndProkashonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DawahAndProkashona::truncate();
        DawahAndProkashona::create([
            'total_pathagar' => 22,
            'total_pathagar_increase' => 2,
            'total_pathagar_target' => 20,

            'total_online_pathagar' => 22,
            'total_online_pathagar_increase' => 22,
            'total_online_pathagar_target' => 22,

            'books_in_pathagar' => 42,
            'books_in_pathagar_increase' => 24,
            'books_in_pathagar_target' => 42,

            'books_in_pathagar_target' => 52,
            'book_distribution_increase' => 25,
            'book_distribution_target' => 25,

            'unit_book_distribution_center' => 62,
            'unit_book_distribution_center_increase' => 26,
            'unit_book_distribution_center_target' => 72,

            'unit_book_distribution' => 32,
            'unit_book_distribution_increase' => 24,
            'unit_book_distribution_target' => 52,

            'ward_book_sales_center' => 23,
            'ward_book_sales_center_increase' => 2,

            'ward_book_sales' => 42,
            'ward_book_sales_increase' => 25,

            'soft_copy_book_distribution' => 62,
            'soft_copy_book_distribution_increase' => 25,

            'dawat_link_distribution' => 52,
            'dawat_link_distribution_increase' => 24,

            'sonar_bangla' => 24,
            'sonar_bangla_increase' => 2,

            'songram' => 92,
            'songram_increase' => 27,

            'prithibi' => 32,
            'prithibi_increase' => 23,

            'creator' => 3,
            'status' => 1,
        ]);
        DawahAndProkashona::create([
            'total_pathagar' => 32,
            'total_pathagar_increase' => 3,
            'total_pathagar_target' => 30,

            'total_online_pathagar' => 23,
            'total_online_pathagar_increase' => 32,
            'total_online_pathagar_target' => 23,

            'books_in_pathagar' => 43,
            'books_in_pathagar_increase' => 34,
            'books_in_pathagar_target' => 43,

            'books_in_pathagar_target' => 53,
            'book_distribution_increase' => 35,
            'book_distribution_target' => 35,

            'unit_book_distribution_center' => 63,
            'unit_book_distribution_center_increase' => 36,
            'unit_book_distribution_center_target' => 73,

            'unit_book_distribution' => 33,
            'unit_book_distribution_increase' => 34,
            'unit_book_distribution_target' => 53,

            'ward_book_sales_center' => 33,
            'ward_book_sales_center_increase' => 3,

            'ward_book_sales' => 43,
            'ward_book_sales_increase' => 35,

            'soft_copy_book_distribution' => 63,
            'soft_copy_book_distribution_increase' => 35,

            'dawat_link_distribution' => 53,
            'dawat_link_distribution_increase' => 34,

            'sonar_bangla' => 34,
            'sonar_bangla_increase' => 3,

            'songram' => 93,
            'songram_increase' => 37,

            'prithibi' => 33,
            'prithibi_increase' => 33,

            'creator' => 3,
            'status' => 1,
        ]);
        DawahAndProkashona::create([
            'total_pathagar' => 42,
            'total_pathagar_increase' => 4,
            'total_pathagar_target' => 40,

            'total_online_pathagar' => 24,
            'total_online_pathagar_increase' => 42,
            'total_online_pathagar_target' => 24,

            'books_in_pathagar' => 44,
            'books_in_pathagar_increase' => 44,
            'books_in_pathagar_target' => 44,

            'books_in_pathagar_target' => 54,
            'book_distribution_increase' => 45,
            'book_distribution_target' => 45,

            'unit_book_distribution_center' => 64,
            'unit_book_distribution_center_increase' => 46,
            'unit_book_distribution_center_target' => 74,

            'unit_book_distribution' => 34,
            'unit_book_distribution_increase' => 44,
            'unit_book_distribution_target' => 54,

            'ward_book_sales_center' => 43,
            'ward_book_sales_center_increase' => 4,

            'ward_book_sales' => 44,
            'ward_book_sales_increase' => 45,

            'soft_copy_book_distribution' => 64,
            'soft_copy_book_distribution_increase' => 45,

            'dawat_link_distribution' => 54,
            'dawat_link_distribution_increase' => 44,

            'sonar_bangla' => 44,
            'sonar_bangla_increase' => 4,

            'songram' => 94,
            'songram_increase' => 47,

            'prithibi' => 34,
            'prithibi_increase' => 43,

            'creator' => 3,
            'status' => 1,
        ]);
        DawahAndProkashona::create([
            'total_pathagar' => 62,
            'total_pathagar_increase' => 6,
            'total_pathagar_target' => 60,

            'total_online_pathagar' => 26,
            'total_online_pathagar_increase' => 62,
            'total_online_pathagar_target' => 26,

            'books_in_pathagar' => 46,
            'books_in_pathagar_increase' => 64,
            'books_in_pathagar_target' => 46,

            'books_in_pathagar_target' => 56,
            'book_distribution_increase' => 65,
            'book_distribution_target' => 65,

            'unit_book_distribution_center' => 66,
            'unit_book_distribution_center_increase' => 66,
            'unit_book_distribution_center_target' => 76,

            'unit_book_distribution' => 36,
            'unit_book_distribution_increase' => 64,
            'unit_book_distribution_target' => 56,

            'ward_book_sales_center' => 63,
            'ward_book_sales_center_increase' => 6,

            'ward_book_sales' => 46,
            'ward_book_sales_increase' => 65,

            'soft_copy_book_distribution' => 66,
            'soft_copy_book_distribution_increase' => 65,

            'dawat_link_distribution' => 56,
            'dawat_link_distribution_increase' => 64,

            'sonar_bangla' => 64,
            'sonar_bangla_increase' => 6,

            'songram' => 96,
            'songram_increase' => 67,

            'prithibi' => 36,
            'prithibi_increase' => 63,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
