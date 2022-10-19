<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            ['category' => 'エーゴメ'],
            ['category' => 'vs4auti'],
            ['category' => 'etc'],
        ];
        DB::table('categories')->insert($categories);
    }
}
