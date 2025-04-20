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
// If any NULLs slipped in, replace them first
        DB::table('upwords')->whereNull('status')->update(['status' => 'submitted']);

        // Force column to be EXACTLY what you want
        DB::statement("
        ALTER TABLE upwords
        MODIFY COLUMN status
        ENUM('submitted', 'pending', 'editing', 'completed')
        NOT NULL
        DEFAULT 'submitted'
    ");    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
        ALTER TABLE upwords
        MODIFY COLUMN status
        ENUM('submitted', 'pending', 'editing', 'completed')
        NOT NULL
    ");
    }
};
