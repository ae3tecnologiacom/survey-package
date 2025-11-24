<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Question extends Model
{
    protected $table = 'forms.questions';

    protected $fillable = [
        'label',
        'enabled',
        'mimes',
        'slug',
        'field_type_id',
        'input_type_id',
        'hint',
        'placeholder',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'mimes' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function fieldType(): BelongsTo
    {
        return $this->belongsTo(FieldType::class);
    }

    /**
     * @return BelongsTo
     */
    public function inputType(): BelongsTo
    {
        return $this->belongsTo(InputType::class);
    }

    /**
     * @return BelongsToMany
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(
            Option::class, 'forms.question_options'
        )->orderByPivot('order_num');
    }
}
