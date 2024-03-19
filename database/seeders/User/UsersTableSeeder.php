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
        User::create([
            'role' => 3,
            'full_name' =>"selim uddin",
            'gender' => "male",
            'telegram_name' => "selimUddin",
            'telegram_id' => "111",
            'email' => "selimuddin@gmail.com",
            'password' => bcrypt('12345678'),
            'blood_group' => "A+",
        ]);

        User::create([
            'role' => 3,
            'full_name' =>"fokhruddin manik",
            'gender' => "male",
            'telegram_name' => "fokhruddinManik",
            'telegram_id' => "222",
            'email' => "fokhruddinManik@gmail.com",
            'password' => bcrypt('12345678'),
            'blood_group' => "B+",
        ]);
        User::create([
            'role' => 4,
            'full_name' =>"sirajul islam",
            'gender' => "male",
            'telegram_name' => "sirajulIslam",
            'telegram_id' => "333",
            'email' => "sirajulislam@gmail.com",
            'password' => "12345678",
            'blood_group' => "C+",
        ]);
        User::create([
            'role' => 4,
            'full_name' =>"sefatullah masum",
            'gender' => "male",
            'telegram_name' => "sefatullahMasum",
            'telegram_id' => "444",
            'email' => "sefatullahmasum@gmail.com",
            'password' => "12345678",
            'blood_group' => "D+",
        ]);
        User::create([
            'role' => 5,
            'full_name' =>"rupom ehsan",
            'gender' => "male",
            'telegram_name' => "rupomEhsan",
            'telegram_id' => "555",
            'email' => "rupomehsan@gmail.com",
            'password' => "12345678",
            'blood_group' => "E+",
        ]);
        User::create([
            'role' => 5,
            'full_name' =>"yamin hosen",
            'gender' => "male",
            'telegram_name' => "yaminHosen",
            'telegram_id' => "666",
            'email' => "yaminhosen@gmail.com",
            'password' => "12345678",
            'blood_group' => "F+",
        ]);
        User::create([
            'role' => 6,
            'full_name' =>"mahabub alom",
            'gender' => "male",
            'telegram_name' => "mahabubAlom",
            'telegram_id' => "777",
            'email' => "mahabubalom@gmail.com",
            'password' => "12345678",
            'blood_group' => "G+",
        ]);
        User::create([
            'role' => 6,
            'full_name' =>"mojammel haque",
            'gender' => "male",
            'telegram_name' => "mojammelHaque",
            'telegram_id' => "888",
            'email' => "mojammelhaque@gmail.com",
            'password' => "12345678",
            'blood_group' => "H+",
        ]);
        User::create([
            'role' => 6,
            'full_name' =>"tasnimul hasan",
            'gender' => "male",
            'telegram_name' => "tasnimulHasan",
            'telegram_id' => "999",
            'email' => "tasnimulhasan@gmail.com",
            'password' => "12345678",
            'blood_group' => "I+",
        ]);
        User::create([
            'role' => 6,
            'full_name' =>"almas khan",
            'gender' => "male",
            'telegram_name' => "almasKhan",
            'telegram_id' => "1212",
            'email' => "almaskhan@gmail.com",
            'password' => "12345678",
            'blood_group' => "J+",
        ]);
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
            'password' => "1414",
            'blood_group' => "L+",
        ]);
        // User::create([
        //     [
        //         'role' => 3,
        //         'full_name' =>"selim uddin",
        //         'gender' => "male",
        //         'telegram_name' => "selimUddin",
        //         'telegram_id' => "111",
        //         'email' => "selimuddin@gmail.com",
        //         'password' => bcrypt('12345678'),
        //         'blood_group' => "A+",
        //     ],
        //     [
        //         'role' => 3,
        //         'full_name' =>"fokhruddin manik",
        //         'gender' => "male",
        //         'telegram_name' => "fokhruddinManik",
        //         'telegram_id' => "222",
        //         'email' => "fokhruddinManik@gmail.com",
        //         'password' => bcrypt('12345678'),
        //         'blood_group' => "B+",
        //     ],
        //     [
        //         'role' => 4,
        //         'full_name' =>"sirajul islam",
        //         'gender' => "male",
        //         'telegram_name' => "sirajulIslam",
        //         'telegram_id' => "333",
        //         'email' => "sirajulislam@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "C+",
        //     ],
        //     [
        //         'role' => 4,
        //         'full_name' =>"sefatullah masum",
        //         'gender' => "male",
        //         'telegram_name' => "sefatullahMasum",
        //         'telegram_id' => "444",
        //         'email' => "sefatullahmasum@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "D+",
        //     ],
        //     [
        //         'role' => 5,
        //         'full_name' =>"rupom ehsan",
        //         'gender' => "male",
        //         'telegram_name' => "rupomEhsan",
        //         'telegram_id' => "555",
        //         'email' => "rupomehsan@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "E+",
        //     ],
        //     [
        //         'role' => 5,
        //         'full_name' =>"yamin hosen",
        //         'gender' => "male",
        //         'telegram_name' => "yaminHosen",
        //         'telegram_id' => "666",
        //         'email' => "yaminhosen@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "F+",
        //     ],
        //     [
        //         'role' => 6,
        //         'full_name' =>"mahabub alom",
        //         'gender' => "male",
        //         'telegram_name' => "mahabubAlom",
        //         'telegram_id' => "777",
        //         'email' => "mahabubalom@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "G+",
        //     ],
        //     [
        //         'role' => 6,
        //         'full_name' =>"mojammel haque",
        //         'gender' => "male",
        //         'telegram_name' => "mojammelHaque",
        //         'telegram_id' => "888",
        //         'email' => "mojammelhaque@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "H+",
        //     ],
        //     [
        //         'role' => 6,
        //         'full_name' =>"tasnimul hasan",
        //         'gender' => "male",
        //         'telegram_name' => "tasnimulHasan",
        //         'telegram_id' => "999",
        //         'email' => "tasnimulhasan@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "I+",
        //     ],
        //     [
        //         'role' => 6,
        //         'full_name' =>"almas khan",
        //         'gender' => "male",
        //         'telegram_name' => "almasKhan",
        //         'telegram_id' => "1212",
        //         'email' => "almaskhan@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "J+",
        //     ],
        //     [
        //         'role' => 1,
        //         'full_name' =>"super admin",
        //         'gender' => "male",
        //         'telegram_name' => "superAdmin",
        //         'telegram_id' => "1313",
        //         'email' => "superadmin@gmail.com",
        //         'password' => "12345678",
        //         'blood_group' => "K+",
        //     ],
        //     [
        //         'role' => 2,
        //         'full_name' =>"admin",
        //         'gender' => "female",
        //         'telegram_name' => "admin",
        //         'telegram_id' => "1212",
        //         'email' => "admin@gmail.com",
        //         'password' => "1414",
        //         'blood_group' => "L+",
        //     ],
        // ]);
    }
}
