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

            $table->string('name_ru')->nullable();
            $table->string('name_uz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('images')->nullable();
            
            $table->text('text_ru')->nullable();
            $table->text('text_uz')->nullable();
            $table->text('text_en')->nullable();
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
