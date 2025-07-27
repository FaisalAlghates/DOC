<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('testings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('documentation_id');
            $table->string('test_type')->nullable();
            $table->text('test_description')->nullable();
            $table->text('test_results')->nullable();
            $table->string('test_case_id')->nullable();
            $table->string('test_case_description')->nullable();
            $table->string('created_by')->nullable();
            $table->string('revised_by')->nullable();
            $table->string('priority')->nullable();
            $table->string('tester_name')->nullable();
            $table->date('date_tested')->nullable();
            $table->string('test_execution_status')->nullable();
            $table->json('prerequisites')->nullable();
            $table->json('steps')->nullable();
            $table->timestamps();

            $table->foreign('documentation_id')->references('id')->on('documentations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('testings');
    }
};
