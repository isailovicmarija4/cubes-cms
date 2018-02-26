<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('tags')->truncate();
		DB::table('products_tags')->truncate();
		
		for($i = 1; $i <= 10; $i ++) {
			
			DB::table('tags')->insert([
				'title' => 'Tag ' . $i
			]);
		}
		
		$tagIds = DB::table('tags')->get()->pluck('id');
		$productIds = DB::table('products')->get()->pluck('id');
		
		foreach ($productIds as $productId) {
			
			foreach ($tagIds->random(rand(3,8)) as $tagId) {
				
				DB::table('products_tags')->insert([
					'product_id' => $productId,
					'tag_id' => $tagId
				]);
			}
		}
    }
}
