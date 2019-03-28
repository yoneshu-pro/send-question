<?php

use Illuminate\Database\Seeder;

class PresentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('presents')->insert([
            [
                'present_code' => '1',
                'title' => 'test'
            ]
        ]);
    }
}
