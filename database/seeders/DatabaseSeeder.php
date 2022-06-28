<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       /*  $this->call(TypeSeeder::class);
        $this->call(TextBookSeeder::class);
        $this->call(WordSeeder::class);
        $this->call(YearSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(UsersTableSeeder::class); */

        User::factory()->count(10)->create();
    }
}
