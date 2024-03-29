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
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default(12345678);
            $table->tinyInteger('age');
            $table->tinyInteger('experience');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technicians');
    }
};
