<?php
require __DIR__ . '/auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EstalishmentController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ClasseController;



Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('auth.login');

Route::get('section/settings', 'SectionSettingsController@index');


Route::get('/template', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('template');

Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'redirectToDashboard'])->name('dashboard');

    // ====={CRUD KHALID}=====
    Route::view('/storage', 'sections.storage')->name('storage');
    Route::view('/fix_issues', 'sections.fix_issues')->name('fix_issues');
    Route::view('/comments', 'sections.comments')->name('comments');
    Route::view('/settings', 'sections.settings')->name('settings');
    Route::view('/template', 'sections.template')->name('template');

});

Route::middleware(['auth', 'admin'])->group(function () {
    // ====={CRUD establishment}=====
    Route::get('/index', [EstalishmentController::class, 'index'])->name('estalishments.index');
    Route::get('/estalishments/create', [EstalishmentController::class, 'create'])->name('estalishments.create');
    Route::post('/estalishments', [EstalishmentController::class, 'store'])->name('estalishments.store');
    Route::get('/estalishments/{estalishment}/edit', [EstalishmentController::class, 'edit'])->name('estalishments.edit');
    Route::put('/estalishments/{estalishment}', [EstalishmentController::class, 'update'])->name('estalishments.update');
    Route::delete('/estalishments/{estalishment}', [EstalishmentController::class, 'destroy'])->name('estalishments.destroy');

    // ====={CRUD Classes}=====
    Route::get('/classes/create', [ClasseController::class, 'create'])->name('classes.create');
    Route::get('/classes', [ClasseController::class, 'index'])->name('classes.index');
    Route::post('/classes', [ClasseController::class, 'store'])->name('classes.store');
    Route::get('/classes/{classe}/edit', [ClasseController::class, 'edit'])->name('classes.edit');
    Route::put('/classes/{classe}', [ClasseController::class, 'update'])->name('classes.update');
    Route::delete('/classes/{classe}', [ClasseController::class, 'destroy'])->name('classes.destroy');

    // ====={CRUD Marques}=====
    Route::get('/marques/create', [MarqueController::class, 'create'])->name('marques.create');
    Route::get('/marques', [MarqueController::class, 'index'])->name('marques.index');
    Route::post('/marques', [MarqueController::class, 'store'])->name('marques.store');
    Route::get('/marques/{marque}/edit', [MarqueController::class, 'edit'])->name('marques.edit');
    Route::put('/marques/{marque}', [MarqueController::class, 'update'])->name('marques.update');
    Route::delete('/marques/{marque}', [MarqueController::class, 'destroy'])->name('marques.destroy');

    // ====={CRUD Types}=====
    Route::get('/types/create', [TypeController::class, 'create'])->name('types.create');
    Route::get('/types', [TypeController::class, 'index'])->name('types.index');
    Route::post('/types', [TypeController::class, 'store'])->name('types.store');
    Route::get('/types/{type}/edit', [TypeController::class, 'edit'])->name('types.edit');
    Route::put('/types/{type}', [TypeController::class, 'update'])->name('types.update');
    Route::delete('/types/{type}', [TypeController::class, 'destroy'])->name('types.destroy');

    // ====={CRUD Devices}=====
    Route::get('/devices/create', [DeviceController::class, 'create'])->name('devices.create');
    Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
    Route::get('/devices/{device}/edit', [DeviceController::class, 'edit'])->name('devices.edit');
    Route::put('/devices/{device}', [DeviceController::class, 'update'])->name('devices.update');
    Route::delete('/devices/{device}', [DeviceController::class, 'destroy'])->name('devices.destroy');

});





