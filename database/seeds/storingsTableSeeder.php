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
            'name' => '冷蔵',
            'created_at' => '2021-7-16',
            'updated_at' => '2021-7-16',
     
        ]);
        DB::table('storings')->insert([
            'name' => '冷凍',
            'created_at' => '2021-7-16',
            'updated_at' => '2021-7-16',
     
        ]);
        DB::table('storings')->insert([
            'name' => '野菜室',
            'created_at' => '2021-7-16',
            'updated_at' => '2021-7-16',
     
        ]);
    }
}
