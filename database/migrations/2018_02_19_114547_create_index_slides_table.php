<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndexSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('index_slides', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			$table->string('photo_filename')->nullable();
			$table->string('url')->nullable();
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
        Schema::dropIfExists('index_slides');
    }
}
