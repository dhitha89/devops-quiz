<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\QuizController;

Route::get('/quiz/{slug}', [QuizController::class, 'show']);
