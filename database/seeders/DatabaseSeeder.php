<?php

namespace Database\Seeders;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Diego Briones',
            'email'=>'dbrionesmtz@yahoo.com',
            'password'=>bcrypt('123456789')
        ]);
        Event::create([
            'datetime'=>'2021-11-09 22:00:00',
            'address'=>'Faker Street 221B, Fake City',
            'price'=>889.99
        ]);
        Attendee::factory(38)->create();
    }
}
