<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $textbooks =[
            ['textbook' => 'ホライズン'],
            ['textbook' => 'クラウン'],
            ['textbook' => 'サンシャイン'],
            ['textbook' => 'ヴィジョンクエスト'],
            ['textbook' => 'パワーオン'],
            ['textbook' => 'その他'],

        ];
        DB::table('textbooks')->insert($textbooks);

    }
}
