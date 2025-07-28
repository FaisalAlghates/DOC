<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

// Add documentation_id column to best_practice_documentations
if (!Schema::hasColumn('best_practice_documentations', 'documentation_id')) {
    Schema::table('best_practice_documentations', function (Blueprint $table) {
        $table->unsignedBigInteger('documentation_id')->after('id');
        $table->foreign('documentation_id')->references('id')->on('documentations')->cascadeOnDelete();
    });
    echo "Added documentation_id column to best_practice_documentations table\n";
} else {
    echo "documentation_id column already exists in best_practice_documentations table\n";
}

echo "Database fix completed!\n";
