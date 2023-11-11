<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_slider_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->integer('order');

            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');

            $table->unsignedBigInteger('slider_item_id')
                ->nullable();
            $table->foreign('slider_item_id')
                ->references('id')
                ->on('slider_items')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_slider_items');
    }
};
