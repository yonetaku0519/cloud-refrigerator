<?php

use Illuminate\Database\Seeder;

class storingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('storings')->insert([
            'name' => '冷蔵'
        ]);
        DB::table('storings')->insert([
            'name' => '冷凍'
        ]);
        DB::table('storings')->insert([
            'name' => '野菜室'
        ]);
    }
}
