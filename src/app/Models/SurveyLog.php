<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurveyLog extends Model
{
    protected $table = 'forms.survey_logs';

    protected $fillable = [
        'survey_id',
        'action',
        'data',
        'device',
    ];

    /**
     * @return BelongsTo
     */
    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
