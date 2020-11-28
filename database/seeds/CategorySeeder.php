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
        \App\Category::create(['name'=>'non-fiction']);
        \App\Category::create(['name'=>'biographies']);
         \App\Category::create(['name'=>'novels']);
        \App\Category::create(['name'=>'history']);
        \App\Category::create(['name'=>'science-fiction']);
        \App\Category::create(['name'=>'sports']);
    }
}
