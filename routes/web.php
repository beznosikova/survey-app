<?php

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

//1 index
Route::get('/', [\App\Http\Controllers\SurveyController::class, 'index']);

Route::prefix('survey')->group(function () {
    //2    /survey/create
    Route::get('/create', [\App\Http\Controllers\SurveyController::class, 'create'])->name('surveys.create');
    Route::post('/create', [\App\Http\Controllers\SurveyController::class, 'store']);
    //3. `/survey/edit/[id badania]`
    Route::get('/edit/{survey}', [\App\Http\Controllers\SurveyController::class, 'edit'])->name('surveys.edit');
    Route::put('/edit/{survey}', [\App\Http\Controllers\SurveyController::class, 'update']);
    Route::delete('/{survey}', [\App\Http\Controllers\SurveyController::class, 'destroy'])->name('surveys.delete');
//  4  Podstrona /survey/questions/[id badania]
    Route::get('/questions/{survey}', [\App\Http\Controllers\QuestionController::class, 'index'])
        ->name('surveys.questions');
});
