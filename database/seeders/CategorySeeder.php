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
        $categories = [
            ['category' => 'エイゴメ'],
            ['category' => 'vs4auti'],
            ['category' => 'etc'],
            ['category' => 'サービス'],
            ['category' => 'メンテナンス'],
            ['category' => 'リリース'],
        ];
        DB::table('categories')->insert($categories);
    }
}
