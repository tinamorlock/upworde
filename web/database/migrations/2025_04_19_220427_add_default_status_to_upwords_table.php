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
        Schema::table('upwords', function (Blueprint $table) {
            Schema::table('upwords', function (Blueprint $table) {
                $table->string('status')->default('draft')->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('upwords', function (Blueprint $table) {
            $table->string('status')->default(null)->change(); // or just remove default if needed

        });
    }
};
