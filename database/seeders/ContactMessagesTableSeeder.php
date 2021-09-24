<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Datetime;

class ContactMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact_messages')->delete();
        $contact_messages = array(
            ['name' => 'First message', 'email' => 'john.doe@example.com', 'message' => 'This is my first message', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
        DB::table('contact_messages')->insert($contact_messages);
    }
}
