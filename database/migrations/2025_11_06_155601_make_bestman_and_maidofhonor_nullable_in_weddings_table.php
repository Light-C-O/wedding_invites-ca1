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
        Schema::table('weddings', function (Blueprint $table) {
            //This alters the table to make them null
            $table->string('best_man')->nullable()->change();
            $table->string('maid_of_honor')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('weddings', function (Blueprint $table) {
            //
            $table->string('best_man')->nullable(false)->change();
            $table->string('maid_of_honor')->nullable(false)->change();
        });
    }
};
