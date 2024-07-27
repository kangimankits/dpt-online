<?php

use App\Http\Controllers\CoreController;
use Illuminate\Support\Facades\Route;

Route::any('/', CoreController::class)->name('core');
