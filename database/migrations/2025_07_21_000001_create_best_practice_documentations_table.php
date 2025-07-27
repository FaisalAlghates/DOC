<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('best_practice_documentations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('project_name');
            $table->text('project_overview')->nullable();
            $table->string('stakeholders')->nullable();
            $table->text('business_goals')->nullable();
            $table->text('deliverables')->nullable();
            $table->string('timeline')->nullable();
            $table->text('architecture')->nullable();
            $table->text('risks')->nullable();
            $table->text('deployment')->nullable();
            $table->text('lessons')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('best_practice_documentations');
    }
};
