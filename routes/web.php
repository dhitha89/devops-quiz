<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuizController;

Route::get('/', [QuizController::class, 'index']);
Route::get('/{slug}', [QuizController::class, 'show']);
