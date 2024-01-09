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
        Schema::create('user_vaccine_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vaccine_center_id')->constrained();
            $table->string('name', 50);
            $table->string('phone_number')->unique();
            $table->string('nid')->unique();
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_vaccine_registrations');
    }
};
