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
        Schema::table('slider_items', function (Blueprint $table) {
            $table->dropColumn([
                'page_id',
                'order',
                'media_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slider_items', function (Blueprint $table) {
            $table->integer('page_id')->after('id');
            $table->integer('order')->after('page_id');

            $table->integer('media_id')->nullable()->after('order');
        });
    }
};
