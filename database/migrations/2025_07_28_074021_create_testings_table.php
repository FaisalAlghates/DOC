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
        Schema::create('testings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documentation_id');
            $table->unsignedBigInteger('user_id');
            $table->string('test_type');
            $table->text('test_description')->nullable();
            $table->text('test_results')->nullable();
            $table->timestamps();

            $table->foreign('documentation_id')->references('id')->on('documentations')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testings');
    }
};
