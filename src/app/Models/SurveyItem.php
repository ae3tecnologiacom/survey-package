<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurveyItem extends Model
{
    protected $table = 'forms.survey_items';

    protected $fillable = [
        'survey_id',
        'question_id',
        'answers',
    ];

    /**
     * @return BelongsTo
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
