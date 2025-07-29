<?php

require_once 'vendor/autoload.php';

// Start Laravel application
$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use App\Models\EngineeringDocumentation;
use App\Models\Documentation;

echo "Testing Documentation Update...\n";

// جلب أول توثيق
$doc = EngineeringDocumentation::first();
if (!$doc) {
    echo "No documentation found!\n";
    exit;
}

echo "Found documentation with ID: " . $doc->id . "\n";
echo "Current purpose: " . $doc->purpose . "\n";

// تحديث البيانات
$newPurpose = "تحديث جديد - " . date('Y-m-d H:i:s');
$doc->update(['purpose' => $newPurpose]);

echo "Updated purpose to: " . $newPurpose . "\n";

// التحقق من التحديث
$freshDoc = $doc->fresh();
echo "Verified purpose: " . $freshDoc->purpose . "\n";

if ($freshDoc->purpose === $newPurpose) {
    echo "✅ Update successful! Data is saved to database.\n";
} else {
    echo "❌ Update failed!\n";
}
