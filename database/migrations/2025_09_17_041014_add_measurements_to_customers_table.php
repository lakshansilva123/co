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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('neck')->nullable();
            $table->string('chest')->nullable();
            $table->string('sleeve')->nullable();
            $table->string('waist')->nullable();
            $table->string('inseam')->nullable();
            $table->string('shoe_size')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['neck', 'chest', 'sleeve', 'waist', 'inseam', 'shoe_size']);
        });
    }
};
