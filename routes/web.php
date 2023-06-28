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
//5    /survey/question-create/[id badania]
    Route::get('/question-create/{survey}', [\App\Http\Controllers\QuestionController::class, 'create'])
        ->name('surveys.questions.create');
    Route::post('/question-create/{survey}', [\App\Http\Controllers\QuestionController::class, 'store']);
//6    /survey/question-edit/[id badania]/[id pytania]
    Route::get('/question-edit/{survey}/{question}', [\App\Http\Controllers\QuestionController::class, 'edit'])
        ->name('surveys.questions.edit');
    Route::put('/question-edit/{survey}/{question}', [\App\Http\Controllers\QuestionController::class, 'update']);
    Route::delete('/questions/{survey}/{question}', [\App\Http\Controllers\QuestionController::class, 'destroy'])
        ->name('surveys.questions.delete');
//7    /survey/question-options/[id badania]/[id pytania]
    Route::get('/question-options/{survey}/{question}', [\App\Http\Controllers\OptionController::class, 'index'])
        ->name('surveys.questions.options');
//8    /survey/question-option-create/[id badania]/[id pytania]
    Route::get('/question-option-create/{survey}/{question}', [\App\Http\Controllers\OptionController::class, 'create'])
        ->name('surveys.questions.options.create');
    Route::post('/question-option-create/{survey}/{question}', [\App\Http\Controllers\OptionController::class, 'store']
    );
//9    /survey/question-option-edit/[id badania]/[id pytania]/[id opcji]
    Route::get(
        '/question-option-edit/{survey}/{question}/{option}',
        [\App\Http\Controllers\QuestionController::class, 'edit']
    )
        ->name('surveys.questions.options.edit');
    Route::put(
        '/question-option-edit/{survey}/{question}/{option}',
        [\App\Http\Controllers\QuestionController::class, 'update']
    );
    Route::delete(
        '/questions/{survey}/{question}/{option}',
        [\App\Http\Controllers\QuestionController::class, 'destroy']
    )
        ->name('surveys.questions.options.delete');
});
