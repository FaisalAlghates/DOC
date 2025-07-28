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
        Schema::create('engineering_documentations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documentation_id');
            $table->text('purpose')->nullable();
            $table->text('scope')->nullable();
            $table->text('definitions')->nullable();
            $table->text('overall_description')->nullable();
            $table->text('product_perspective')->nullable();
            $table->text('user_classes')->nullable();
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

            $table->foreign('documentation_id')->references('id')->on('documentations')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineering_documentations');
    }
};
