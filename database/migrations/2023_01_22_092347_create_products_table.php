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
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('color_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('rate_id')->nullable()->constrained();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('short_text');
            $table->string('short_text_uz');
            $table->string('short_text_ru');
            $table->string('text');
            $table->string('text_uz');
            $table->string('text_ru');
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
