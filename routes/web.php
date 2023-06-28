<?php

use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
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

Route::get('/', [SurveyController::class, 'index']);

Route::prefix('survey')->group(function () {
    Route::get('/create', [SurveyController::class, 'create'])->name('surveys.create');
    Route::post('/create', [SurveyController::class, 'store']);

    Route::get('/edit/{survey}', [SurveyController::class, 'edit'])->name('surveys.edit');
    Route::put('/edit/{survey}', [SurveyController::class, 'update']);
    Route::delete('/{survey}', [SurveyController::class, 'destroy'])->name('surveys.delete');

    Route::get('/questions/{survey}', [QuestionController::class, 'index'])
        ->name('surveys.questions');

    Route::get('/question-create/{survey}', [QuestionController::class, 'create'])
        ->name('surveys.questions.create');
    Route::post('/question-create/{survey}', [QuestionController::class, 'store']);

    Route::get('/question-edit/{survey}/{question}', [QuestionController::class, 'edit'])
        ->name('surveys.questions.edit');
    Route::put('/question-edit/{survey}/{question}', [QuestionController::class, 'update']);
    Route::delete('/questions/{survey}/{question}', [QuestionController::class, 'destroy'])
        ->name('surveys.questions.delete');

    Route::get('/question-options/{survey}/{question}', [OptionController::class, 'index'])
        ->name('surveys.questions.options');

    Route::get('/question-option-create/{survey}/{question}', [OptionController::class, 'create'])
        ->name('surveys.questions.options.create');
    Route::post('/question-option-create/{survey}/{question}', [OptionController::class, 'store']
    );

    Route::get('/question-option-edit/{survey}/{question}/{option}', [OptionController::class, 'edit'])
        ->name('surveys.questions.options.edit');
    Route::put('/question-option-edit/{survey}/{question}/{option}', [OptionController::class, 'update']);
    Route::delete('/questions/{survey}/{question}/{option}', [OptionController::class, 'destroy'])
        ->name('surveys.questions.options.delete');
});
