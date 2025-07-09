<?php

use App\Http\Controllers\StudentGradingController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'admin:auth',
    'prefix' => 'semesters',
    'as' => 'admin.'
], function () {
    Route::get('select-semester', [StudentGradingController::class, 'index'])->name('get.semester');
    Route::get('{semester}/grading', [StudentGradingController::class, 'getGrading'])->name('get.grading');
});
