<?php

use App\Http\Controllers\GiftController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Gift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {

        if(Auth::user()->admin == 1){
            $gifts = Gift::get(); 
            return view('dashboard')->with('gifts', $gifts);
        } else {
            $gifts = Gift::where('status', 1)->get(); 
            return view('gifts')->with(['gifts' => $gifts, 'fullWidth' => true]);
        }

    })->name('index');

    Route::get('/vou-levar-esse/{id}', [GiftController::class, 'take'])->name('gifts.take');


    Route::group(['middleware' => 'admin'], function () {
        Route::prefix('presentes')->group(function () {
            Route::name('gifts.')->group(function () {
                Route::get('/adicionar', [GiftController::class, 'create'])->name('create');
                Route::post('/adicionar', [GiftController::class, 'store'])->name('store');
                Route::get('/editar/{id}', [GiftController::class, 'edit'])->name('edit');
                Route::put('/editar/{id}', [GiftController::class, 'update'])->name('update');
                Route::get('/desabilitar/{id}', [GiftController::class, 'destroy'])->name('destroy');
            });
        });
        
        Route::prefix('administracao')->group(function () {
            Route::prefix('usuarios')->group(function () {
                Route::name('users.')->group(function () {
                    Route::get('/', [UserController::class, 'index'])->name('index');
                    Route::get('/adicionar', [UserController::class, 'create'])->name('create');
                    Route::post('/adicionar', [UserController::class, 'store'])->name('store');
                    Route::get('/desabilitar/{id}', [UserController::class, 'destroy'])->name('destroy');
                    Route::get('/editar/{id}', [UserController::class, 'edit'])->name('edit');
                    Route::put('/editar/{id}', [UserController::class, 'update'])->name('update');
                });
            });
        });
    });


});
require __DIR__.'/auth.php';
