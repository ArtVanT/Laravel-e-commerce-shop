<?php

use App\Http\Controllers\ItemController;
use App\Livewire\Admin;
use App\Livewire\Edit;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;





Route::get('/', [ItemController::class, 'index'])->name('home');



Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    Route::get('/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/', [ItemController::class, 'store'])->name('items.store');
    Route::get('{user}/items/{item}/edit', Edit::class)->name('items.edit');
    //Route::put('/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');


});

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/admin', Admin::class)->name('render');
     Route::get('/admin/items/{item}/edit', Edit::class)->name('admin.items.edit');
});



require __DIR__ . '/auth.php';
