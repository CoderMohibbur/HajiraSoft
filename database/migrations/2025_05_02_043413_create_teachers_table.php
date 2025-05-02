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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('madrasah_id');
            $table->string('subject')->nullable();
            $table->string('designation')->nullable();
            $table->date('join_date')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('nid_number')->nullable();
            $table->string('photo')->nullable();
            $table->integer('leave_balance')->nullable();
            $table->text('remarks')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
