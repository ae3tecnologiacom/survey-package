<?php

namespace Ae3\Survey\app\Http\Controllers;

use Ae3\Survey\app\Survey\StoreSurveyService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function store(Request $request)
    {
        return app(StoreSurveyService::class)->execute($request->validated());
    }
}
