<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\GenerusManagementController;
use App\Http\Controllers\Apps\DesaManagementController;
use App\Http\Controllers\Apps\KelompokManagementController;
use App\Http\Controllers\Apps\JenjangManagementController;

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('change-password', [ChangePasswordController::class, 'store']);
    Route::get('change-password', [ChangePasswordController::class, 'create'])->name('password.change');

    Route::name('generus-management.')->group(function () {
        Route::resource('/generus-management/generus', GenerusManagementController::class);
    });

    Route::name('desa-management.')->group(function () {
        Route::resource('/desa-management/desa', DesaManagementController::class);
    });
    Route::name('kelompok-management.')->group(function () {
        Route::resource('/kelompok-management/kelompok', KelompokManagementController::class);
    });
    Route::name('jenjang-management.')->group(function () {
        Route::resource('/jenjang-management/jenjang', JenjangManagementController::class);
    });
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
