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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('st_address_1');
            $table->string('st_address_2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('zip');
            $table->string('web_url')->nullable();
            $table->string('ig_url')->nullable();
            $table->string('fb_url')->nullable();
            $table->string('x_url')->nullable();
            $table->string('substack_url')->nullable();
            $table->string('tiktok_url')->nullable();
            $table->string('amazon_url')->nullable();
            $table->string('pin_url')->nullable();
            $table->string('medium_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('writer_type')->nullable();
            $table->string('bio')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
