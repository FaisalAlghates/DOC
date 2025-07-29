<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->boot();

try {
    echo "Current role column type:\n";
    $result = DB::select("SHOW COLUMNS FROM users LIKE 'role'");
    if (!empty($result)) {
        echo "Type: " . $result[0]->Type . "\n";
        echo "Default: " . $result[0]->Default . "\n";
        
        echo "\nUpdating existing role values...\n";
        
        // Update existing data
        $updated1 = DB::update("UPDATE users SET role = 'admin' WHERE role IN ('owner', 'developer')");
        echo "Updated {$updated1} users from owner/developer to admin\n";
        
        $updated2 = DB::update("UPDATE users SET role = 'user' WHERE role = 'viewer'");
        echo "Updated {$updated2} users from viewer to user\n";
        
        echo "\nAltering column to new enum...\n";
        
        // Alter the column to new enum
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'user') DEFAULT 'user'");
        
        echo "Successfully updated role column enum!\n";
        
        echo "\nNew role column type:\n";
        $result = DB::select("SHOW COLUMNS FROM users LIKE 'role'");
        echo "Type: " . $result[0]->Type . "\n";
        echo "Default: " . $result[0]->Default . "\n";
        
        echo "\nCurrent users:\n";
        $users = DB::select("SELECT id, name, email, role FROM users");
        foreach ($users as $user) {
            echo "ID: {$user->id}, Name: {$user->name}, Role: {$user->role}\n";
        }
        
    } else {
        echo "Role column not found!\n";
    }
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Stack trace: " . $e->getTraceAsString() . "\n";
}
