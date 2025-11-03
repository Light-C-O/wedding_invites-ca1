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
        // Add 'role' column to users table
        Schema::table('users', function (Blueprint $table) {
            // Add 'role' column to users table
            $table->string('role')->default('user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop 'role' column if it exists
        Schema::table('users', function (Blueprint $table) {
            // Remove 'role' column from users table
            $table->dropColumn('role');
        });
    }
};
