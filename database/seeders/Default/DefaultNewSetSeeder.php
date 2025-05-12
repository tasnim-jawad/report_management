<?php

namespace Database\Seeders\Default;

use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgThanaResponsible;
use App\Models\Organization\OrgThanaUser;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgWardResponsible;
use App\Models\Organization\OrgWardUser;
use App\Models\Parent\ParentThana;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class DefaultNewSetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        // OrgThana::truncate();
        // OrgThanaUser::truncate();


        try {
            DB::transaction(function () {
                // Create OrgThana records and capture their IDs
                $thana_men = OrgThana::create([
                    'title' => "Mirpur",
                    'description' => "Mirpur is a thana of Dhaka Mohanogor North",
                    'org_city_id' => 1,
                    'org_type_id' => 1,
                    'org_area_id' => 1,
                    'org_gender' => 'men',
                ]);

                $thana_women = OrgThana::create([
                    'title' => "Mirpur",
                    'description' => "Mirpur is a thana of Dhaka Mohanogor North",
                    'org_city_id' => 1,
                    'org_type_id' => 1,
                    'org_area_id' => 1,
                    'org_gender' => 'women',
                ]);

                $parent = ParentThana::create([
                    'man_thana_id' => $thana_men->id,
                    'woman_thana_id' => $thana_women->id,
                ]);

                // Create User records with specific roles
                $thana_amir_men = User::create([
                    'role' => 4,
                    'full_name' => "thana_amir_{$thana_men->id}",
                    'gender' => "male",
                    'telegram_name' => "thana_amir_{$thana_men->id}",
                    'telegram_id' => "1313",
                    'email' => "thana_amir_{$thana_men->id}@gmail.com",
                    'password' => "12345678",
                    'blood_group' => "A+",
                    'is_permitted' => 1,
                ]);
                $thana_secretary_women = User::create([
                    'role' => 4,
                    'full_name' => "thana_secretary_{$thana_women->id}",
                    'gender' => "female",
                    'telegram_name' => "thana_secretary_{$thana_women->id}",
                    'telegram_id' => "1212",
                    'email' => "thana_secretary_{$thana_women->id}@gmail.com",
                    'password' => "12345678",
                    'blood_group' => "O+",
                    'is_permitted' => 1,
                ]);

                // Create OrgThanaUser records with correct thana_id and is_parent values
                OrgThanaUser::insert([
                    [
                        'user_id' => $thana_amir_men->id,
                        'city_id' => $thana_men->org_city_id,
                        'thana_id' => $thana_men->id,
                        'is_parent' => 1,
                    ],
                    [
                        'user_id' => $thana_secretary_women->id,
                        'city_id' => $thana_women->org_city_id,
                        'thana_id' => $thana_women->id,
                        'is_parent' => 0,
                    ],
                ]);

                // Create OrgThanaResponsible records with correct thana_id and is_parent values
                OrgThanaResponsible::create([
                    'user_id' => $thana_amir_men->id,
                    'responsibility_id' => 1,
                    'org_thana_id' => $thana_men->id,
                ]);
                OrgThanaResponsible::create([
                    'user_id' => $thana_secretary_women->id,
                    'responsibility_id' => 2,
                    'org_thana_id' => $thana_women->id,
                ]);


                $ward_men = OrgWard::create([
                    'title' => $thana_men->title,
                    'no' => 1,
                    'description' => "{$thana_men->title} is a parent ward",
                    'org_city_id' => $thana_men->org_city_id,
                    'org_thana_id' => $thana_men->id,
                    'org_type_id' => $thana_men->org_type_id,
                    'org_area_id' => $thana_men->org_area_id,
                    'is_thana_parent' => 1,
                    'org_gender' => 'men',
                ]);
                $ward_women = OrgWard::create([
                    'title' => $thana_women->title,
                    'no' => 1,
                    'description' => "{$thana_women->title} is a parent ward",
                    'org_city_id' => $thana_women->org_city_id,
                    'org_thana_id' => $thana_women->id,
                    'org_type_id' => $thana_women->org_type_id,
                    'org_area_id' => $thana_women->org_area_id,
                    'is_thana_parent' => 1,
                    'org_gender' => 'women',
                ]);


                $ward_president_men = User::create([
                    'role' => 5,
                    'full_name' => "ward_president_{$ward_men->id}",
                    'gender' => "male",
                    'telegram_name' => "ward_president_{$ward_men->id}",
                    'telegram_id' => "1313",
                    'email' => "ward_president_{$ward_men->id}@gmail.com",
                    'password' => "12345678",
                    'blood_group' => "A+",
                    'is_permitted' => 1,
                ]);
                $ward_president_women = User::create([
                    'role' => 5,
                    'full_name' => "ward_president_{$ward_women->id}",
                    'gender' => "female",
                    'telegram_name' => "ward_president_{$ward_women->id}",
                    'telegram_id' => "1212",
                    'email' => "ward_president_{$ward_women->id}@gmail.com",
                    'password' => "12345678",
                    'blood_group' => "O+",
                    'is_permitted' => 1,
                ]);

                // Create OrgThanaUser records with correct thana_id and is_parent values
                OrgWardUser::insert([
                    [
                        'user_id' => $ward_president_men->id,
                        'city_id' => $ward_men->org_city_id,
                        'thana_id' => $ward_men->org_thana_id,
                        'ward_id' => $ward_men->id,
                    ],
                    [
                        'user_id' => $ward_president_women->id,
                        'city_id' => $ward_women->org_city_id,
                        'thana_id' => $ward_women->org_thana_id,
                        'ward_id' => $ward_women->id,
                    ],
                ]);

                // Create OrgWardResponsible records 
                OrgWardResponsible::create([
                    'user_id' => $ward_president_men->id,
                    'responsibility_id' => 1,
                    'org_ward_id' => $ward_men->id,
                ]);
                OrgWardResponsible::create([
                    'user_id' => $ward_president_women->id,
                    'responsibility_id' => 1,
                    'org_ward_id' => $ward_women->id,
                ]);
                
            });
    
            echo "Seeding completed successfully.\n";
    
        } catch (Exception $e) {
            // Output error to console
            echo "Seeding failed: " . $e->getMessage() . "\n";
    
            // Optionally log the full error stack
            Log::error('Seeder error', ['error' => $e]);
        }

    }
}
