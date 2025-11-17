<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah kolom is_public ke semua tables
        Schema::table('experiences', function (Blueprint $table) {
            $table->boolean('is_public')->default(true);
        });

        Schema::table('educations', function (Blueprint $table) {
            $table->boolean('is_public')->default(true);
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->boolean('is_public')->default(true);
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('is_public')->default(true);
        });

        // Tambah last_updated untuk cache busting
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('portfolio_updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn('is_public');
        });

        Schema::table('educations', function (Blueprint $table) {
            $table->dropColumn('is_public');
        });

        Schema::table('skills', function (Blueprint $table) {
            $table->dropColumn('is_public');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('is_public');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('portfolio_updated_at');
        });
    }
};