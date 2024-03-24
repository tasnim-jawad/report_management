<?php

namespace Database\Seeders\User;

use App\Models\User\UserContact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserContact::truncate();
        UserContact::insert([
            [
                'type' => 'whatsapp',
                'value' => '+8801567435234',
                'user_id' => 1,
            ],
            [
                'type' => 'telegram',
                'value' => '+880134534643563',
                'user_id' => 2,
            ],
            [
                'type' => 'personal',
                'value' => '+880134255473',
                'user_id' => 3,
            ],
            [
                'type' => 'signal',
                'value' => '+880133246543635',
                'user_id' => 4,
            ],
            [
                'type' => 'whatsapp',
                'value' => '+88015344533463',
                'user_id' => 5,
            ],
            [
                'type' => 'telegram',
                'value' => '+8801879789879',
                'user_id' => 6,
            ],
            [
                'type' => 'personal',
                'value' => '+8801657556',
                'user_id' => 7,
            ],
            [
                'type' => 'signal',
                'value' => '+880156898967',
                'user_id' => 8,
            ],
            [
                'type' => 'whatsapp',
                'value' => '+88017985643',
                'user_id' => 9,
            ],
            [
                'type' => 'telegram',
                'value' => '+880178543876345',
                'user_id' => 10,
            ],
        ]);
    }
}
