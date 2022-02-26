<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' => 'Analgesik Narkotik',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'Analgesik Non Narkotik',
        ]);
    }
}
