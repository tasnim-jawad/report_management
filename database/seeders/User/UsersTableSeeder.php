<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        User::create([
            'role' => 1,
            'full_name' =>"super admin",
            'gender' => "male",
            'telegram_name' => "superAdmin",
            'telegram_id' => "1313",
            'email' => "superadmin@gmail.com",
            'password' => "12345678",
            'blood_group' => "K+",
        ]);
        User::create([
            'role' => 2,
            'full_name' =>"admin",
            'gender' => "female",
            'telegram_name' => "admin",
            'telegram_id' => "1212",
            'email' => "admin@gmail.com",
            'password' => "12345678",
            'blood_group' => "L+",
        ]);
        User::create([
            'role' => 2,
            'full_name' =>"selim uddin",
            'gender' => "male",
            'telegram_name' => "selimUddin",
            'telegram_id' => "111",
            'email' => "selimuddin@gmail.com",
            'password' => bcrypt('12345678'),
            'blood_group' => "A+",
        ]);

        User::create([
            'role' => 2,
            'full_name' =>"sirajul islam",
            'gender' => "male",
            'telegram_name' => "sirajulIslam",
            'telegram_id' => "333",
            'email' => "sirajulislam@gmail.com",
            'password' => "12345678",
            'blood_group' => "C+",
        ]);

        User::create([
            'role' => 3,
            'full_name' =>"city_amir",
            'gender' => "male",
            'telegram_name' => "city_amir",
            'telegram_id' => "city_amir",
            'email' => "city_amir@gmail.com",
            'password' => bcrypt('12345678'),
            'blood_group' => "B+",
        ]);

        User::create([
            'role' => 4,
            'full_name' =>"thana_amir",
            'gender' => "male",
            'telegram_name' => "thana_amir",
            'telegram_id' => "thana_amir",
            'email' => "thana_amir@gmail.com",
            'password' => bcrypt('12345678'),
            'blood_group' => "B+",
        ]);

        User::create([
            'role' => 5,
            'full_name' =>"ward_1_amir",
            'gender' => "male",
            'telegram_name' => "ward_1_amir",
            'telegram_id' => "ward_1_amir",
            'email' => "ward_1_amir@gmail.com",
            'password' => bcrypt('12345678'),
            'blood_group' => "B+",
        ]);
        User::create([
            'role' => 5,
            'full_name' =>"ward_2_amir",
            'gender' => "male",
            'telegram_name' => "ward_2_amir",
            'telegram_id' => "ward_2_amir",
            'email' => "ward_2_amir@gmail.com",
            'password' => bcrypt('12345678'),
            'blood_group' => "B+",
        ]);

        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'role' => 6,
                'full_name' => "Unit $i",
                'gender' => 'male', // Alternates between male and female
                'telegram_name' => "Unit_$i",
                'telegram_id' => "1000$i", // Slightly different Telegram ID for each user
                'email' => "unit_$i@gmail.com", // Different email for each user
                'password' => bcrypt('12345678'), // Ensure password is hashed
                'blood_group' => ($i % 2 == 0) ? 'O+' : 'A-', // Alternates blood group
            ]);
        }

        // User::create([
        //     'role' => 4,
        //     'full_name' =>"sirajul islam",
        //     'gender' => "male",
        //     'telegram_name' => "sirajulIslam",
        //     'telegram_id' => "333",
        //     'email' => "sirajulislam@gmail.com",
        //     'password' => "12345678",
        //     'blood_group' => "C+",
        // ]);

        // User::create([
        //     'role' => 4,
        //     'full_name' =>"sefatullah masum",
        //     'gender' => "male",
        //     'telegram_name' => "sefatullahMasum",
        //     'telegram_id' => "444",
        //     'email' => "sefatullahmasum@gmail.com",
        //     'password' => "12345678",
        //     'blood_group' => "D+",
        // ]);
        // User::create([
        //     'role' => 5,
        //     'full_name' =>"rupom ehsan",
        //     'gender' => "male",
        //     'telegram_name' => "rupomEhsan",
        //     'telegram_id' => "555",
        //     'email' => "rupomehsan@gmail.com",
        //     'password' => "12345678",
        //     'blood_group' => "E+",
        // ]);
        // User::create([
        //     'role' => 5,
        //     'full_name' =>"yamin hosen",
        //     'gender' => "male",
        //     'telegram_name' => "yaminHosen",
        //     'telegram_id' => "666",
        //     'email' => "yaminhosen@gmail.com",
        //     'password' => "12345678",
        //     'blood_group' => "F+",
        // ]);
        // User::create([
        //     'role' => 6,
        //     'full_name' =>"mahabub alom",
        //     'gender' => "male",
        //     'telegram_name' => "mahabubAlom",
        //     'telegram_id' => "777",
        //     'email' => "mahabubalom@gmail.com",
        //     'password' => "12345678",
        //     'blood_group' => "G+",
        // ]);
        // User::create([
        //     'role' => 6,
        //     'full_name' =>"mojammel haque",
        //     'gender' => "male",
        //     'telegram_name' => "mojammelHaque",
        //     'telegram_id' => "888",
        //     'email' => "mojammelhaque@gmail.com",
        //     'password' => "12345678",
        //     'blood_group' => "H+",
        // ]);
        // User::create([
        //     'role' => 6,
        //     'full_name' =>"tasnimul hasan",
        //     'gender' => "male",
        //     'telegram_name' => "tasnimulHasan",
        //     'telegram_id' => "999",
        //     'email' => "tasnimulhasan@gmail.com",
        //     'password' => "12345678",
        //     'blood_group' => "I+",
        // ]);
        // User::create([
        //     'role' => 6,
        //     'full_name' =>"almas khan",
        //     'gender' => "male",
        //     'telegram_name' => "almasKhan",
        //     'telegram_id' => "1212",
        //     'email' => "almaskhan@gmail.com",
        //     'password' => "12345678",
        //     'blood_group' => "J+",
        // ]);
    }
}
