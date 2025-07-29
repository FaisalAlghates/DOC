<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->boot();

// Insert the migration record manually to mark it as run
DB::table('migrations')->insert([
    'migration' => '2025_07_29_082650_add_role_to_users_table',
    'batch' => DB::table('migrations')->max('batch') + 1
]);

echo "Migration marked as completed.\n";
