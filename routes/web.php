<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    MenuController,
    RolesController,
    UsersController
};

use Auth;

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
Auth::routes(['register' => false]);
Route::get('/', function () {
    if (Auth::guard()->check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');
    }
})->name('index');

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::middleware(['auth', 'core'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('core.')->prefix('/core')->namespace('Core')->group(function () {
        Route::get('menu', [MenuController::class, 'index'])->name('menu');
        Route::post('menu/add', [MenuController::class, 'addProcess'])->name('menu.add.process');
        Route::put('menu/edit/{routes}', [MenuController::class, 'editProcess'])->name('menu.edit.process');
        Route::delete('menu/delete/{routes}', [MenuController::class, 'deleteProcess'])->name('menu.delete.process');

        Route::get('roles', [RolesController::class, 'index'])->name('roles');
        Route::post('roles/add', [RolesController::class, 'addProcess'])->name('roles.add.process');
        Route::put('roles/edit/{roles}', [RolesController::class, 'editProcess'])->name('roles.edit.process');
        Route::delete('roles/delete/{roles}', [RolesController::class, 'deleteProcess'])->name('roles.delete.process');
        Route::get('roles/routes/{roles}', [RolesController::class, 'routes'])->name('roles.routes');
        Route::put('roles/routes/{roles}', [RolesController::class, 'updateProcess'])->name('roles.routes.update.process');

        Route::get('users', [UsersController::class, 'index'])->name('users');
        Route::get('users/add', [UsersController::class, 'add'])->name('users.add');
        Route::post('users/add', [UsersController::class, 'addProcess'])->name('users.add.process');
        Route::get('users/edit/{user}', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('users/edit/{user}', [UsersController::class, 'editProcess'])->name('users.edit.process');
        Route::get('users/delete/{user}', [UsersController::class, 'delete'])->name('users.delete');
        Route::delete('users/delete/{user}', [UsersController::class, 'deleteProcess'])->name('users.delete.process');
    });
});