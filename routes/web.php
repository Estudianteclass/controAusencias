<?php

use App\Livewire\AbsenceComponent;
use App\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');
Route::redirect('/', '/dashboard');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/vistaAdmin', function () {
    return view('vistaAdmin');
});
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/usuarios', UserManagement::class)->name('usuarios');
require __DIR__ . '/auth.php';

//por si quiero dejarlo como antes
/*

<?php

use App\Livewire\AbsenceComponent;
use App\Livewire\UserManagement;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/usuarios',UserManagement::class)->name('usuarios');
require __DIR__.'/auth.php';


*/