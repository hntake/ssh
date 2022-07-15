<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            ['name' => '山田太朗',
            'user_name' => 'yamada',
            'school1' => '11',
            'school2' => '000',
            'place' => '沖縄県',
            'year' => '中2',
            'point' => '0',
            'email' => 'taro@example.com',
            'password' => 'password']
        ];
        DB::table('users')->insert($users);

    }
}
