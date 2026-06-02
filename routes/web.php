<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesertaController;

Route::get('/', function () {
    return redirect()->route('pesertas.index');
});

Route::resource('pesertas', PesertaController::class);