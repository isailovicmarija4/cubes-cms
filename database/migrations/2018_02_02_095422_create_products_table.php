<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('product_category_id')->default(0);
			$table->integer('product_brand_id')->default(0);
			$table->string('title');
			$table->string('photo_filename')->nullable();
			$table->text('description')->nullable();
			$table->longText('specification')->nullable();
			$table->decimal('price', 8, 2)->default(0);
			$table->decimal('quantity', 8, 2)->default(0);
			$table->tinyInteger('on_sale')->default(0);
			$table->decimal('discount', 8, 2)->default(0);
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
