<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('testings', function (Blueprint $table) {
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
        });
    }

    public function down()
    {
        Schema::table('testings', function (Blueprint $table) {
            $table->dropColumn([
                'test_case_id',
                'test_case_description',
                'created_by',
                'revised_by',
                'priority',
                'tester_name',
                'date_tested',
                'test_execution_status',
                'prerequisites',
                'steps',
            ]);
        });
    }
};
