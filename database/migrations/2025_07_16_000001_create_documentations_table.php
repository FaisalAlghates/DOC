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
        Schema::create('documentations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('purpose')->nullable();
            $table->string('scope')->nullable();
            $table->text('definitions')->nullable();
            $table->text('overall_description')->nullable();
            $table->string('product_perspective')->nullable();
            $table->string('user_classes')->nullable();
            $table->text('operating_environment')->nullable();
            $table->text('constraints')->nullable();
            $table->text('assumptions')->nullable();
            $table->text('functional_requirements')->nullable();
            $table->text('nonfunctional_requirements')->nullable();
            $table->text('use_cases')->nullable();
            $table->text('data_model')->nullable();
            $table->text('interface_requirements')->nullable();
            $table->text('appendices')->nullable();
            $table->text('compliance_report')->nullable();
            $table->text('database_tables')->nullable();
            $table->text('ui_ux')->nullable();
            $table->text('conclusion')->nullable();
            $table->text('content')->nullable();
            $table->json('code_files')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentations');
    }
};
