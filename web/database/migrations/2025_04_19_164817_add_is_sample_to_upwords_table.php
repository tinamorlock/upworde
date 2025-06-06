<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('upwords', function (Blueprint $table) {
            $table->boolean('is_sample')->default(false)->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('upwords', function (Blueprint $table) {
            $table->dropColumn('is_sample');
        });
    }
};
