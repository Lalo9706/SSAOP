<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ObraController;
use Illuminate\Support\Facades\Route;

//Rutas y funciones a las que solo tiene acceso un usuario invitado (guest)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});


//Las rutas y funciones a las que solo tiene acceso un usuario autenticado (auth)
Route::middleware('auth')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create']) //Acceder a la pantalla de registro de usuario
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']); //Registrar el usuario nuevo en la base de datos

    Route::get('verify-email', EmailVerificationPromptController::class) //Verificar el correo electrónico (función no implementada)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class) //Verificar el correo electrónico (función no implementada)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send'); //Enviar el correo de verificación del correo electrónico (función no implementada)

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});