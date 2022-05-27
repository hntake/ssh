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
            ['year' => '2004'],
            ['year' => '2005'],
            ['year' => '2006'],
            ['year' => '2007'],
            ['year' => '2008'],
            ['year' => '2009'],
            ['year' => '2010'],
            ['year' => '2011'],
            ['year' => '2012'],
            ['year' => '2013'],
            ['year' => '2014'],
            ['year' => '2015'],
            ['year' => '2016'],

        ];
        DB::table('years') ->insert($years);
    }
}
