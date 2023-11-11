<?php

use App\Http\Controllers\PageController;
use App\Livewire\FrontendPage;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{parentSlug?}/{childSlug?}', [PageController::class, 'index'])->name('frontend.page');
