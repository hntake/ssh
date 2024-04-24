<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres =[
            ['genre' => '脱税'],
            ['genre' => '脱税疑惑'],
            ['genre' => '有罪判決'],
            ['genre' => '軽犯罪'],
            ['genre' => '贈賄'],
            ['genre' => '贈賄疑惑'],
            ['genre' => '不正受給'],
            ['genre' => '公職選挙法違反'],
            ['genre' => 'スキャンダル'],
            ['genre' => '反社会団体との関係'],
            ['genre' => 'その他'],

        ];
        DB::table('genres')->insert($genres);    }
}
