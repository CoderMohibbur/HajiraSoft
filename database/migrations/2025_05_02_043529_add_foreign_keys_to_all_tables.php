<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // ✅ users table: madrasah_id
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('madrasah_id')->references('id')->on('madrasahs')->nullOnDelete();
        });

        // ✅ upazilas table: district_id
        Schema::table('upazilas', function (Blueprint $table) {
            $table->foreign('district_id')->references('id')->on('districts')->cascadeOnDelete();
        });

        // ✅ madrasahs table: district_id, upazila_id, created_by
        Schema::table('madrasahs', function (Blueprint $table) {
            $table->foreign('district_id')->references('id')->on('districts')->cascadeOnDelete();
            $table->foreign('upazila_id')->references('id')->on('upazilas')->cascadeOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
        });

        // ✅ teachers table: user_id, madrasah_id
        Schema::table('teachers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('madrasah_id')->references('id')->on('madrasahs')->cascadeOnDelete();
        });

        // ✅ leaves table: teacher_id, leave_type_id, approved_by
        Schema::table('leaves', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
            $table->foreign('leave_type_id')->references('id')->on('leave_types')->restrictOnDelete();
            $table->foreign('approved_by')->references('id')->on('users')->nullOnDelete();
        });

        // ✅ attendances table: teacher_id, madrasah_id, verified_by, created_by
        Schema::table('attendances', function (Blueprint $table) {
            $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
            $table->foreign('madrasah_id')->references('id')->on('madrasahs')->cascadeOnDelete();
            $table->foreign('verified_by')->references('id')->on('users')->nullOnDelete();
            $table->foreign('created_by')->references('id')->on('users')->nullOnDelete();
        });

        // ✅ audit_logs table: user_id
        Schema::table('audit_logs', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });

        // ✅ sessions table: user_id
        Schema::table('sessions', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['madrasah_id']);
        });

        Schema::table('upazilas', function (Blueprint $table) {
            $table->dropForeign(['district_id']);
        });

        Schema::table('madrasahs', function (Blueprint $table) {
            $table->dropForeign(['district_id']);
            $table->dropForeign(['upazila_id']);
            $table->dropForeign(['created_by']);
        });

        Schema::table('teachers', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['madrasah_id']);
        });

        Schema::table('leaves', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropForeign(['leave_type_id']);
            $table->dropForeign(['approved_by']);
        });

        Schema::table('attendances', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropForeign(['madrasah_id']);
            $table->dropForeign(['verified_by']);
            $table->dropForeign(['created_by']);
        });

        Schema::table('audit_logs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('sessions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
};
