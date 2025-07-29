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
        Schema::table('testings', function (Blueprint $table) {
            // Make test_type nullable since it's not being used in the form
            $table->string('test_type')->nullable()->change();
            
            $table->string('test_case_id')->nullable()->after('documentation_id');
            $table->text('test_case_description')->nullable()->after('test_case_id');
            $table->string('created_by')->nullable()->after('test_case_description');
            $table->string('revised_by')->nullable()->after('created_by');
            $table->string('priority')->nullable()->after('revised_by');
            $table->string('tester_name')->nullable()->after('priority');
            $table->date('date_tested')->nullable()->after('tester_name');
            $table->string('test_execution_status')->nullable()->after('date_tested');
            $table->json('prerequisites')->nullable()->after('test_execution_status');
            $table->json('steps')->nullable()->after('prerequisites');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
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
                'steps'
            ]);
        });
    }
};
