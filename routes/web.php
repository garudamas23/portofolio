<?php
// File: routes/web.php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProjectController;
use Illuminate\Support\Facades\Route;

// Frontend Portfolio
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Dashboard route untuk Breeze
Route::get('/dashboard', function () {
    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

// PROFILE ROUTES - HARUS ADA
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('experiences', ExperienceController::class);
    Route::resource('educations', EducationController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('projects', ProjectController::class);
});

// Tambah route untuk clear cache manual
Route::get('/clear-cache', [PortfolioController::class, 'clearCache'])->name('clear.cache');

// Debug routes
Route::get('/debug/check-user', function () {
    $user = \App\Models\User::first();
    
    echo "<h1>User Data Check</h1>";
    echo "<pre>";
    print_r([
        'id' => $user->id,
        'name' => $user->name,
        'professional_title' => $user->professional_title,
        'bio' => $user->bio,
        'photo' => $user->photo,
        'updated_at' => $user->updated_at->format('Y-m-d H:i:s')
    ]);
    echo "</pre>";
    
    // Test update
    echo "<h2>Test Update</h2>";
    echo "<form method='POST' action='/debug/test-update-simple'>";
    echo csrf_field();
    echo "<input type='text' name='name' value='Test Name " . date('H:i:s') . "'><br>";
    echo "<input type='text' name='professional_title' value='Test Title " . date('H:i:s') . "'><br>";
    echo "<textarea name='bio'>Test Bio " . date('H:i:s') . "</textarea><br>";
    echo "<button type='submit'>Test Update</button>";
    echo "</form>";
});

Route::post('/debug/test-update-simple', function (Request $request) {
    $user = \App\Models\User::first();
    
    $user->update([
        'name' => $request->name,
        'professional_title' => $request->professional_title,
        'bio' => $request->bio
    ]);
    
    return redirect('/debug/check-user')->with('success', 'Test update berhasil!');
});

// Biarkan Breeze handle authentication
require __DIR__.'/auth.php';