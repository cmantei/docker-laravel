<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TallerMiddleware;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TallerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CocheWebController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        $user = Auth::user();
        if($user->role === 'cliente'){
            return redirect()->route('citascliente.index');
        }
        if($user->role === 'taller'){
            return redirect()->route('citastaller.index');
        }
        abort(403, 'Acceso denegado.');
     })->middleware(['auth', 'verified'])->name('dashboard');
    
    // Route::get('/', function () {
    //    return redirect()->route('dashboard');
    //});

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('/citascliente', ClienteController::class)->only(['index', 'create', 'store', 'show']);
    Route::resource('/citastaller', TallerController::class)->middleware(TallerMiddleware::class);
    
    Route::get('/pendientes', [TallerController::class, 'pendientes'])->middleware(TallerMiddleware::class)->name('pendientes');
    
    Route::get('/coches', [CocheWebController::class, 'index'])->name('coches');

});

require __DIR__.'/auth.php';
