<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\ProjectController;
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
Route::name('guest.')->group(function (){

    Route::get('/', [GuestController::class, 'index'])->name('home');
    Route::get('/projects', [GuestController::class, 'projects'])->name('projects');
    Route::get('/test', function(){return view('admin.projects.mail.newproject');})->name('test');
});

// Route::get('/', function () {
//     return view('welcome')->name('home');
// });

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function (){
    Route::get('/dashboard', [PageController::class, 'dashboard'] )->name('dashboard');
    Route::resource('projects', ProjectController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
