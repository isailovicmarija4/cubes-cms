<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('parent_id')->default(0);
			$table->string('short_title');
			$table->string('title');
			$table->string('photo_filename')->nullable();
			$table->text('description')->nullable();
			$table->longText('body')->nullable();
			$table->integer('order_number')->default(0);
			$table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('static_pages');
    }
}
