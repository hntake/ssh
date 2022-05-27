<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types =[
            ['type' => '中1'],
            ['type' => '中2'],
            ['type' => '中3'],
            ['type' => '高1'],
            ['type' => '高2'],
            ['type' => '高3'],
            ['type' => 'その他'],

        ];
        DB::table('types')->insert($types);
    }
}
