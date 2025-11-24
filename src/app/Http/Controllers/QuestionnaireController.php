<?php

namespace Ae3\Survey\app\Http\Controllers;

use Ae3\Survey\app\Services\ListQuestionnaireService;
use Ae3\Survey\app\Services\ShowQuestionnaireService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index(Request $request)
    {
        return app(ListQuestionnaireService::class)->execute();
    }

    public function show(int|string $id)
    {
        return app(ShowQuestionnaireService::class)->execute($id);
    }
}
