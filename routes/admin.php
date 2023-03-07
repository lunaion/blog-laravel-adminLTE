<?php

use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\GeneralValidationController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LicenseActivatioController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ReinstallationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SiteController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TurnController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [HomeController::class, 'index'])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('admin.users');

Route::resource('roles', RoleController::class)->except('show')->names('admin.roles');

Route::resource('categories', CategoryController::class)->except('show')->names('admin.categories');

Route::resource('countries', CountryController::class)->except('show')->names('admin.countries');

Route::resource('cities', CityController::class)->except('show')->names('admin.cities');

Route::resource('sites', SiteController::class)->except('show')->names('admin.sites');

Route::resource('turns', TurnController::class)->except('show', 'edit', 'update', 'destroy')->names('admin.turns');

Route::resource('areas', AreaController::class)->except('show')->names('admin.areas');

Route::resource('positions', PositionController::class)->except('show')->names('admin.positions');

Route::resource('licenseActivations', LicenseActivatioController::class)->except('show')->names('admin.licenseActivations');

Route::resource('generalValidations', GeneralValidationController::class)->except('show')->names('admin.generalValidations');

Route::resource('reinstallations', ReinstallationController::class)->names('admin.reinstallations');

Route::resource('backups', BackupController::class)->except('show')->names('admin.backups');

Route::resource('tags', TagController::class)->except('show')->names('admin.tags');

Route::resource('posts', PostController::class)->except('show')->names('admin.posts');

// Exportación de información en formato excel.
Route::get('/sites/export', [SiteController::class, 'export'])->name('admin.sites.export');
Route::get('/users/export', [UserController::class, 'export'])->name('admin.users.export');
Route::get('/turns/export', [TurnController::class, 'export'])->name('admin.turns.export');