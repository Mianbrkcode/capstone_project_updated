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
            $table->string('responder_name');
            $table->string('userfrom');
            $table->string('role')->default('Sector');
            $table->string('email');
            // $table->timestamp('email_verified_at')->nullable();
            $table->enum('status' , ['pending' ,'active'])->default('pending');
            $table->string('token')->nullable();
            $table->string('password');
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
