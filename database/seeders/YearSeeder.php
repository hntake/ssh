<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years =[
            ['year' => '未選択'],
            ['year' => '小3'],
            ['year' => '小4'],
            ['year' => '小5'],
            ['year' => '小6'],
            ['year' => '中1'],
            ['year' => '中2'],
            ['year' => '中3'],
            ['year' => '高1'],
            ['year' => '高2'],
            ['year' => '高3'],
            ['year' => '大学生'],
        ];
        DB::table('years') ->insert($years);
    }
}
