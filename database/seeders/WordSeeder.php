<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $words =[
            ['type' => '7' ,'textbook' => '6','test_name' => 'sample', 'user_name' => 'test', 'ja1' => 'りんご','ja2' => 'みかん','ja3' => '母','ja4' => '父','ja5' => '兄','ja6' => '姉','ja7' => '家','ja8' => '勉強する','ja9' => '食べる','ja10' => '早く','en1' => 'apple','en2' => 'orange','en3' => 'mother','en4' => 'father','en5' => 'brother','en6' => 'sister','en7' => 'house','en8' => 'study','en9' => 'eat','en10'=>'early'],

        ];
        DB::table('words')->insert($words);
    }
}
