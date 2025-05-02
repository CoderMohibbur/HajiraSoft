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
        Schema::create('madrasahs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('eiin')->unique();
            $table->string('institute_code')->nullable()->unique();
            $table->enum('type', ['ebtedayee', 'dakhil', 'alim', 'fazil'])->default('dakhil');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('upazila_id');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->date('established_at')->nullable();
            $table->string('logo')->nullable();
            $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('madrasahs');
    }
};
