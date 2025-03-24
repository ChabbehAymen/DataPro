<?php
// In your routes file (web.php or api.php)

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Make sure these routes are properly defined and not commented out
Route::middleware('auth:sanctum')->group(function () {
    // Keep both routes for compatibility
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/profile', function (Request $request) {
        return $request->user(); // Simple solution to ensure at least one route works
    });

    // Proper controller routes (if you have the controller)
    // Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
});
