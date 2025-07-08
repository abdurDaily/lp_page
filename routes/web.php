<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserStatus;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\finance\FinanceController;
use App\Http\Controllers\backend\order\OrderController as OrderOrderController;
use App\Http\Controllers\backend\product\ProductController;
use App\Http\Controllers\backend\permission\PermissionController;
use App\Http\Controllers\backend\profile\ProfileController as ProfileProfileController;
use App\Http\Controllers\frontend\order\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user-status'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');




//**PROFILE SETTING */
Route::middleware(['auth', 'user-status'])->get('/profile-setting', [ProfileProfileController::class, 'index'])->name('profile.setting');
Route::middleware(['auth', 'user-status'])->post('/pass-update', [ProfileProfileController::class, 'updatePassword'])->name('pass.update');
Route::middleware(['auth', 'user-status'])->post('/profile-image', [ProfileProfileController::class, 'profileImageUpload'])->name('profile.store');
Route::middleware(['auth', 'user-status'])->post('/profile-info', [ProfileProfileController::class, 'profileInfo'])->name('profile.info');



//**FINANCE ROUTE'S */
Route::middleware(['auth', 'user-status'])->prefix('finance/')->name('finance.')->group(function () {
    Route::get('index', [FinanceController::class, 'financeIndex'])->name('index');
    Route::post('index', [FinanceController::class, 'financeStore'])->name('store');
    Route::get('all-finance-record', [FinanceController::class, 'getFinanceRecord'])->name('get.finance');
    Route::get('delete/{id}', [FinanceController::class, 'deleteFinanceItem'])->name('delete.finance');
    Route::get('edit/{id}', [FinanceController::class, 'editFinanceItem'])->name('edit.finance');
    Route::put('update/{id}', [FinanceController::class, 'updateFinanceItem'])->name('update.finance');
});


//**ROLE AND PERMISSION */
Route::middleware(['auth', 'user-status'])->prefix('permission')->name('permission.')->group(function () {
    Route::get('/assign-permission', [PermissionController::class, 'index'])->name('index');
    Route::post('/assign-permission', [PermissionController::class, 'assignPermission'])->name('assign.permission');
});


//**PRODUCT  */
Route::middleware(['auth', 'user-status'])
    ->prefix('product')
    ->name('product.')
    ->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/product-record', [ProductController::class, 'productRecords'])->name('records');
        Route::post('/store', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('destroy'); // AJAX delete
    });



//**BACKEND ORDER   */
Route::middleware(['auth', 'user-status'])
    ->prefix('backend_order')
    ->name('backend.order.')
    ->group(function () {
        Route::get('/', [OrderOrderController::class, 'index'])->name('index');

        // Single toggle route for status
        Route::post('/toggle-status/{id}', [OrderOrderController::class, 'toggleStatus'])->name('toggle-status');
    });




//**ORDER FOR FRONTEND  */
Route::prefix('frontend/order')
    ->name('frontend.order.')
    ->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::post('/store-order', [OrderController::class, 'store'])->name('store');
    });


require __DIR__ . '/auth.php';
