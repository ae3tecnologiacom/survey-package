<?php

namespace Ae3\Survey\app\Services;

use Ae3\Survey\app\Repositories\QuestionnaireRepository;

class ShowQuestionnaireService
{
    public function execute(int|string $id)
    {
        return app(QuestionnaireRepository::class)->find($id);
    }
}