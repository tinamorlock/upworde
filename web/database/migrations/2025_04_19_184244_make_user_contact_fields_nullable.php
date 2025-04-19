<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->change();
            $table->string('st_address_1')->nullable()->change();
            $table->string('st_address_2')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('zip')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable(false)->change();
            $table->string('st_address_1')->nullable(false)->change();
            $table->string('st_address_2')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('state')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('zip')->nullable(false)->change();
        });
    }
};
