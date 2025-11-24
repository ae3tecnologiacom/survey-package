<?php

namespace Ae3\Survey\app\Repositories;

use Ae3\Survey\app\Base\Repository\BaseRepository;
use Ae3\Survey\app\Models\Survey;

class SurveyRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Survey::class);
    }
}