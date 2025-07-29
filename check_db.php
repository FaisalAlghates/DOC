<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->boot();

try {
    $columns = DB::select('DESCRIBE users');
    echo "Users table structure:\n";
    foreach ($columns as $column) {
        echo "Column: {$column->Field}, Type: {$column->Type}, Default: {$column->Default}\n";
    }
    
    echo "\nCurrent users and their roles:\n";
    $users = DB::select('SELECT id, name, email, role FROM users');
    foreach ($users as $user) {
        echo "ID: {$user->id}, Name: {$user->name}, Email: {$user->email}, Role: {$user->role}\n";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
