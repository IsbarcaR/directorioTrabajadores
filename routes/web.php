<?php

use App\Http\Controllers\TrabajadorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('trabajador.index');
});
Route::get('trabajador/filtro',[TrabajadorController::class, 'filtro'])->name('trabajador.filtro');
Route::get('trabajadores',[TrabajadorController::class, 'index'])->name('trabajador.index');
Route::get('trabajadores/crear',[TrabajadorController::class, 'create'])->name('trabajador.create');
Route::post('trabajadores',[TrabajadorController::class, 'store'])->name('trabajadores.store');
Route::get('trabajadores/{id}',[TrabajadorController::class, 'edit'])->name('trabajador.edit');
Route::put('trabajador/{id}',[TrabajadorController::class, 'update'])->name('trabajador.update');
Route::delete('trabajador/{id}',[TrabajadorController::class, 'destroy'])->name('trabajador.destroy');
Route::get('trabajador/{id}',[TrabajadorController::class, 'show'])->name('trabajador.show');

