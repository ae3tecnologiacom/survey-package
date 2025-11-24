<?php

use Illuminate\Support\Facades\Route;
use \Ae3\Survey\app\Http\Controllers\QuestionnaireController;
use \Ae3\Survey\app\Http\Controllers\SurveyController;

Route::prefix('forms')->group(function () {
    Route::prefix('questionnaires')->group(function () {
        Route::get('', [QuestionnaireController::class, 'index'])->name('questionnaires.index');
        Route::get('/{questionnaire_id}', [QuestionnaireController::class, 'show'])->name('questionnaires.show');
    });
    Route::prefix('survey')->group(function () {
        Route::post('', [SurveyController::class, 'store'])->name('survey.store');
    });
});