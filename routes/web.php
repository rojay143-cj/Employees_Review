<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/register', function(){
    return view('pages.register_view');
})->name('register');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', function(){
        return view('pages.dashboard');
    })->name('dashboard');
});
// routes/web.php
use App\Http\Controllers\EmployeeDocumentController;

Route::get('/employee-documents/download/{id}', [EmployeeDocumentController::class, 'download'])
    ->name('employee-documents.download');