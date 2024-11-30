<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PGIController;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\ProfileController;

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

    //Mostrar el formulario para el registro de un PGI
    Route::get('/pgis', [PGIController::class, 'create'])->name('pgis.create');

    //Registrar un PGI
    Route::post('/pgis',[PGIController::class, 'store'])->name('pgis.store'); //POST

    //Mostrar el formulario para el registro de una obra
    Route::get('/obras', [ObraController::class, 'create'])->name('obras.create');

    //Registrar una Obra
    Route::post('/obras',[ObraController::class, 'store'])->name('obras.store'); //POST
});



require __DIR__.'/auth.php';
