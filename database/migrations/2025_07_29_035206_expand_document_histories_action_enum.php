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
        $this->setActions(['create', 'update', 'add_test', 'update_test', 'add_engineering', 'update_engineering', 'add_best_practice', 'update_best_practice']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->setActions(['create', 'update']);
    }

    /** MySQL and MariaDB alter the enum in place; other databases (SQLite for the demo) rebuild the column. */
    private function setActions(array $actions): void
    {
        if (in_array(DB::getDriverName(), ['mysql', 'mariadb'], true)) {
            $list = "'".implode("', '", $actions)."'";
            DB::statement("ALTER TABLE `document_histories` MODIFY COLUMN `action` ENUM($list) NOT NULL");

            return;
        }

        Schema::table('document_histories', function (Blueprint $table) use ($actions) {
            $table->enum('action', $actions)->change();
        });
    }
};
