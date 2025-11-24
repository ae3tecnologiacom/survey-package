<?php

namespace Ae3\Survey\app\Models;

use Ae3\Survey\app\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use Sortable;

    protected $table = 'forms.groups';

    protected $fillable = [
        'questionnaire_id',
        'name',
        'description',
        'order_num',
        'enabled',
        'condition',
        'hint',
        'quantity_column_presentation',
    ];

    /**
     * @return BelongsTo
     */
    public function questionnaire(): BelongsTo
    {
        return $this->belongsTo(Questionnaire::class);
    }

    /**
     * @return BelongsToMany
     */
    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(Question::class, 'forms.group_questions')
            ->orderByPivot('order_num');
    }

    /**
     * @return HasMany
     */
    public function conditions(): HasMany
    {
        return $this->hasMany(GroupCondition::class);
    }
}
