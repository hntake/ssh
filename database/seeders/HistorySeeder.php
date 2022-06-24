<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $histories =[
            ['test_id'=> '1',
            'type' => '7',
            'textbook' => '6',
            'test_name' => 'sample',
            'user_name' => 'test',
            'tested_user' =>'taro',
            'tested_name' =>'山田太郎',
            'school' => '123'
            ]
        ];
        DB::table('histories')->insert($histories);
        $histories =[
            ['test_id'=> '1',
            'type' => '7',
            'textbook' => '6',
            'test_name' => 'sample',
            'user_name' => 'test',
            'tested_user' =>'hana',
            'tested_name' =>'山田花子',
            'school' => '123'
            ]
        ];
        DB::table('histories')->insert($histories);

    }
}
