<?php

use App\Http\Controllers\ObraController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ObraController::class, 'index']);

//Mostrar vista de la información de la obra por id
Route::get('/obras/{obra}',[ObraController::class, 'show']); 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    //USUARIOS

    //Mostrar la vista del perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    //Actualizar el Perfil del Usuario en la base de datos
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    //Eliminar el Perfil del Usuario de la base de datos
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Mostrar el formulario para el registro de una obra
    Route::get('/obras', [ObraController::class, 'create'])->name('obras.create');
});



require __DIR__.'/auth.php';
