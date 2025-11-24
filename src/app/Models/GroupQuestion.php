<?php

namespace Ae3\Survey\app\Models;

use Ae3\Survey\app\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupQuestion extends Model
{
    use Sortable;

    protected $table = 'forms.group_questions';

    protected $fillable = [
        'order_num',
        'group_id',
        'question_id',
        'condition',
        'required',
        'custom_resource',
        'is_sensitive_data',
    ];

    protected $casts = [
        'custom_resource' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     * @return BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
