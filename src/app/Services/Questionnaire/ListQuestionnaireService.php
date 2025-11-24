<?php

namespace Ae3\Survey\app\Services;

use Ae3\Survey\app\Repositories\QuestionnaireRepository;

class ListQuestionnaireService
{
    public function execute()
    {
        return app(QuestionnaireRepository::class)->all();
    }
}