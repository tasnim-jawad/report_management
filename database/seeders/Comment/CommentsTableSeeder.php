<?php

namespace Database\Seeders\Comment;

use App\Models\Comment\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table_names = [
            "dawah_and_prokashonas",
            "dawat1_regular_group_wises",
            "dawat2_personal_and_targets",
            "dawat3_general_program_and_others",
            "dawat4_gono_songjog_and_dawat_ovijans",
            "department1_talimul_qurans",
            "department4_different_job_holders_dawats",
            "department5_paribarik_dawats",
            "department7_dawat_in_technologies",
            "kormosuci_bastobayons",
            "proshikkhon1_tarbiats",
            "rastrio1_bishishto_bektis",
            "shomajsheba1_personal_social_works",
            "shomajsheba2_unit_social_works",
            "songothon1_jonosoktis",
            "songothon2_associate_members",
            "songothon5_dawat_and_paribarik_units",
            "songothon7_sofors",
            "songothon8_iyanot_data",
            "songothon9_sangothonik_boithoks",
            "montobbos",
        ];

        foreach ($table_names as $table_name) {
            // Get all columns of the table
            $all_columns = Schema::getColumnListing($table_name);

            // Slice the columns, excluding the first 2 and the last 4
            $selected_columns = array_slice($all_columns, 2, -4);

            // Insert a comment row for each column
            foreach ($selected_columns as $column_name) {
                for($i = 1 ; $i <= 2 ; $i++){
                    Comment::create([
                        'report_info_id' => $i,
                        'org_type ' => 'unit',
                        'org_type_id ' => $i,
                        'report_info_id' => $i,
                        'table_name' => $table_name,
                        'column_name' => $column_name,
                        'comment' => "This is a comment for {$column_name} in table {$table_name} . {$i}",
                        'creator' => null, // Replace with actual creator ID
                        'status' => 1,
                    ]);
                }
            }
        }
    }
}
