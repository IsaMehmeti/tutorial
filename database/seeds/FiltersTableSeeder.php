<?php

use Illuminate\Database\Seeder;

class FiltersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('filters')->insert([
            'color' => 'rose',
            'background_color' => 'black',
            'user_id' => 1,
        ]); 
    }
}
