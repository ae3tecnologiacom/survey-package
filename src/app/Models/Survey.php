<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Survey extends Model
{
    protected $table = 'forms.surveys';

    protected $fillable = [
        'started_at',
        'finished_at',
        'questionnaire_id',
        'status_id',
        'answerable_type',
        'answerable_id',
    ];

    /**
     * @return MorphTo
     */
    public function answerable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return BelongsTo
     */
    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return HasMany
     */
    public function surveyItems(): HasMany
    {
        return $this->hasMany(SurveyItem::class);
    }
}
