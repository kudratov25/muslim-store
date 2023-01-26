<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->nullable()->constrained(); 
            $table->foreignId('product_type_items_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('color_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('name_en');
            $table->text('name_uz');
            $table->text('name_ru');
            $table->text('short_text_en');
            $table->text('short_text_uz');
            $table->text('short_text_ru');
            $table->text('text_en');
            $table->text('text_uz');
            $table->text('text_ru');
            $table->string('image')->nullable();
            $table->bigInteger('quantity');
            $table->bigInteger('price');
            $table->string('size')->nullable();
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
};
