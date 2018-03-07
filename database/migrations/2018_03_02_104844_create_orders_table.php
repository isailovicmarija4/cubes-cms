<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('status')->default(0);
			$table->string('customer_name');
			$table->string('customer_email');
			$table->string('customer_phone');
			$table->string('customer_country');
			$table->string('customer_city');
			$table->string('customer_zip');
			$table->string('customer_address');
			$table->string('delivery_country');
			$table->string('delivery_city');
			$table->string('delivery_zip');
			$table->string('delivery_address');
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
        Schema::dropIfExists('orders');
    }
}
