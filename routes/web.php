<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\LoginController;

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
// Route::prefix('/')->name('home.')->groupe(function(){
//     Route::redirect('/','index');
//     route::resource('home', HomeController::class );
// });


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('signal', [Homecontroller::class,'signal'])->name('signal');
Route::post('signal', [HomeController::class, 'store'])->name('signal.store');

Route::get('historic',[Homecontroller::class, 'historic'])->name('historic');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'user-access:manager'])->group(function() {
    Route::redirect('/admin', '/admin/panel');
    Route::resource('panel', Admin\PanelController::class);
    Route::resource('incidents', Admin\IncidentController::class)->except('create'); 
    Route::get('historique', [Admin\HistoriqueController::class, 'index'])->name('historique.index');
    Route::get('signalisations', [Admin\SignalisationController::class, 'index'])->name('signalisations.index');
    Route::get('histIncidents', [Admin\HistoriqueIncidentsController::class, 'index'])->name('histIncidents.index');

    Route::get('silent/logout', [LoginController::class, 'silentLogout'])->name('silent.logout');

    Route::resource('users', Admin\UserController::class)->middleware(['auth', 'user-access:admin']);

    Route::post('users/{user}/updateUserState', [Admin\UserController::class, 'updateUserState'])->name('users.UpdateState')->middleware(['auth', 'user-access:admin']);
    Route::post('users/{user}/edit', [Admin\UserController::class, 'edit'])->name('users.edit')->middleware(['auth', 'user-access:admin']);
    Route::post('users/{user}/update', [Admin\UserController::class, 'update'])->name('users.update')->middleware(['auth', 'user-access:admin']);
});
// dans le dossier qui porte le même nom que la route ex : admin/incidents/index.blade.php