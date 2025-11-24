<?php

namespace Ae3\Survey\app\Models;

use Ae3\Survey\app\Traits\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionOption extends Model
{
    use Sortable;

    protected $table = 'forms.question_options';

    protected $fillable = [
        'option_id',
        'question_id',
        'order_num',
        'enabled',
    ];

    /**
     * @return BelongsTo
     */
    public function option(): BelongsTo
    {
        return $this->belongsTo(Option::class);
    }

    /**
     * @return BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
