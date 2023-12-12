<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('/users', UserController::class);

    Route::get('/users/create/profile', [UserController::class, 'createStudentProfile'])->name('users.create-student-profile');
    Route::post('/users/create/profile', [UserController::class, 'storeStudentProfile'])->name('users.store-student-profile');
    Route::get('/users/create/profile/legal', [UserController::class, 'createStudentProfileLegal'])->name('users.create-student-profile-legal');
    Route::post('/users/create/profile/legal', [UserController::class, 'storeStudentProfileLegal'])->name('users.store-student-profile-legal');
    Route::get('/users/create/profile/minister', [UserController::class, 'createStudentProfileMinister'])->name('users.create-student-profile-minister');
    Route::post('/users/create/profile/minister', [UserController::class, 'storeStudentProfileMinister'])->name('users.store-student-profile-minister');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
