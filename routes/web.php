<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProfesorController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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

Route::get('/departamente/{facultate_id}', [\App\Http\Controllers\FacultateDepartamentLicentaController::class, 'getByFacultate']);
Route::get('/discipline/{departament_id}', [\App\Http\Controllers\DepartamentDisciplineLicentaController::class, 'getByDepartament']);

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
    Route::resource('/permissions', PermissionController::class);
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('/users', UserController::class);

    Route::get('/student-dashboard', [StudentController::class, 'dashboardStudenti'])->name('students.dashboard');
    Route::post('/student-dashboard/completeaza-locuri', [StudentController::class, 'completeazaLocuri'])->name('students.completeaza');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students-admisi', [StudentController::class, 'indexAdmisi'])->name('students.admisi');
    Route::post('/students/generate', [StudentController::class, 'genereazaStudentiAdmisi'])->name('students.genereaza');
    Route::get('/students/create-profile', [StudentController::class, 'createProfile'])->name('students.create');
    Route::post('/students/create-profile', [StudentController::class, 'storeProfile'])->name('students.store');
    Route::get('/students/create-profile/legal', [StudentController::class, 'createProfileLegal'])->name('students.create-profile-legal');
    Route::post('/students/create-profile/legal', [StudentController::class, 'storeProfileLegal'])->name('students.store-profile-legal');
    Route::get('/students/create-profile/minister', [StudentController::class, 'createProfileMinister'])->name('students.create-profile-minister');
    Route::post('/students/create-profile/minister', [StudentController::class, 'storeProfileMinister'])->name('students.store-profile-minister');
    Route::get('/student/create-profile/informatii-scolaritate', [StudentController::class, 'createInformatiiScolaritate'])->name('students.create-informatii-scolaritate');
    Route::post('/students/create-profile/informatii-scolaritate', [StudentController::class, 'storeInformatiiScolaritate'])->name('students.store-informatii-scolaritate');
    Route::get('/students/create-profile/context-scolaritate', [StudentController::class, 'createContextScolaritate'])->name('students.create-context-scolaritate');
    Route::post('/students/create-profile/context-scolaritate', [StudentController::class, 'storeContextScolaritate'])->name('students.store-context-scolaritate');

    Route::get('/profesor', [ProfesorController::class, 'create'])->name('profesor.create');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
