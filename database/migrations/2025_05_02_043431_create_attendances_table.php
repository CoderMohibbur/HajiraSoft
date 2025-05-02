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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('madrasah_id');
            $table->date('date')->index();
            $table->enum('status', ['present', 'absent', 'late', 'leave'])->index();
            $table->text('remarks')->nullable();
            $table->string('device')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('verified_by')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->unique(['teacher_id', 'date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
