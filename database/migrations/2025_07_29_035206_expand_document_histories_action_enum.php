<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE `document_histories` MODIFY COLUMN `action` ENUM('create', 'update', 'add_test', 'update_test', 'add_engineering', 'update_engineering', 'add_best_practice', 'update_best_practice') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE `document_histories` MODIFY COLUMN `action` ENUM('create', 'update') NOT NULL");
    }
};
