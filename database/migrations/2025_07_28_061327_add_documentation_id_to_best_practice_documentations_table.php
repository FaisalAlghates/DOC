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
        Schema::table('best_practice_documentations', function (Blueprint $table) {
            $table->unsignedBigInteger('documentation_id')->after('id');
            $table->foreign('documentation_id')->references('id')->on('documentations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('best_practice_documentations', function (Blueprint $table) {
            $table->dropForeign(['documentation_id']);
            $table->dropColumn('documentation_id');
        });
    }
};
