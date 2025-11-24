<?php

namespace Ae3\Survey\app\Survey;

use Ae3\Survey\app\Repositories\SurveyRepository;

class StoreSurveyService
{
    public function execute(array $data)
    {
        return app(SurveyRepository::class)->create($data);
    }
}
