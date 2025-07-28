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
        Schema::create('best_practice_documentations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documentation_id');
            $table->text('project_name')->nullable();
            $table->text('project_overview')->nullable();
            $table->text('stakeholders')->nullable();
            $table->text('business_goals')->nullable();
            $table->text('deliverables')->nullable();
            $table->text('timeline')->nullable();
            $table->text('architecture')->nullable();
            $table->text('risks')->nullable();
            $table->text('deployment')->nullable();
            $table->text('lessons')->nullable();
            $table->timestamps();

            $table->foreign('documentation_id')->references('id')->on('documentations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('best_practice_documentations');
    }
};
