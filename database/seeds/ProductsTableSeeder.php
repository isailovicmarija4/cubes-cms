<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();
		DB::table('product_categories')->truncate();
		DB::table('product_brands')->truncate();
		DB::table('product_groups')->truncate();
		
		DB::unprepared(file_get_contents(__DIR__ . '/products.sql'));
    }
}
