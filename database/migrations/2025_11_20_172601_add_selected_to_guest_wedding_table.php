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
        Schema::table('guest_wedding', function (Blueprint $table) {
            //adds a boolean column named selected with a default value of false, positioned right after the wedding_id column in the table.
            $table->boolean('selected')->default(false)->after('wedding_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('guest_wedding', function (Blueprint $table) {
            //
            $table->dropColumn('selected');
        });
    }
};
