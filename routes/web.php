
<?php

define('PROFILE_ROUTE', '/profile');
define('DOCS_ID_ROUTE', '/docs/{id}');

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ForgotPasswordController;

// راوتات تسجيل مستخدم جديد
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// راوتات تسجيل الدخول والخروج اليدوية
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// راوتات إعادة تعيين كلمة المرور
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::get('/', function () {
    // عرض الصفحة الرئيسية
    // يمكنك تعديل هذا الجزء لعرض أي محتوى تريده في الصفحة الرئيسية
    return view('welcome');
})->name('home');
// return view('welcome');} )->name('home');

// تم حذف Auth::routes() بسبب عدم دعم laravel/ui في Laravel 12

Route::middleware(['auth'])->group(function () {
    // لوحة التحكم
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    
    // Test route for debugging
    Route::get('/test-edit', function() {
        return view('test-edit');
    })->name('test.edit');

    // صفحة الملف الشخصي (عرض)
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    // تغيير كلمة المرور
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    // إضافة مطور (للمالك فقط)
    Route::post('/profile/add-developer', [ProfileController::class, 'addDeveloper'])->name('profile.addDeveloper');
    // تعديل الملف الشخصي
    Route::get(PROFILE_ROUTE, [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch(PROFILE_ROUTE, [ProfileController::class, 'update'])->name('profile.update');
    Route::delete(PROFILE_ROUTE, [ProfileController::class, 'destroy'])->name('profile.destroy');

    // سجل العمليات (للمالك فقط)
    Route::get('/history', [\App\Http\Controllers\HistoryController::class, 'index'])->name('history.index');
    
    // إدارة المستخدمين
    Route::resource('users', \App\Http\Controllers\UserManagementController::class);
    
    // CRUD التوثيقات
    Route::get('/docs', [DocumentationController::class, 'index'])->name('docs.index');
    Route::get('/docs/create', [DocumentationController::class, 'create'])->name('docs.create');
    Route::post('/docs', [DocumentationController::class, 'store'])->name('docs.store');
    Route::get(DOCS_ID_ROUTE, [DocumentationController::class, 'show'])->name('docs.show');
    Route::get(DOCS_ID_ROUTE . '/edit', [DocumentationController::class, 'edit'])->name('docs.edit');
    Route::put(DOCS_ID_ROUTE, [DocumentationController::class, 'update'])->name('docs.update');
    Route::delete(DOCS_ID_ROUTE, [DocumentationController::class, 'destroy'])->name('docs.destroy');
    // Testing resourceful routes
    Route::get('/testing', [\App\Http\Controllers\TestingController::class, 'index'])->name('testing.index');
    Route::get('/testing/create', [\App\Http\Controllers\TestingController::class, 'create'])->name('testing.create');
    Route::post('/testing', [\App\Http\Controllers\TestingController::class, 'store'])->name('testing.store');
    Route::get('/testing/{id}', [\App\Http\Controllers\TestingController::class, 'show'])->name('testing.show');
    Route::get('/testing/{id}/edit', [\App\Http\Controllers\TestingController::class, 'edit'])->name('testing.edit');
    Route::put('/testing/{id}', [\App\Http\Controllers\TestingController::class, 'update'])->name('testing.update');
    Route::delete('/testing/{id}', [\App\Http\Controllers\TestingController::class, 'destroy'])->name('testing.destroy');
});
