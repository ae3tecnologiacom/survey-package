<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Option extends Model
{
    protected $table = 'forms.options';
    protected $fillable = [
        'label',
        'enabled',
        'slug'
    ];

    /**
     * @return BelongsToMany
     */
    public function questions(): BelongsToMany
    {
        return $this->belongsToMany(
            Question::class, 'forms.question_options'
        )->orderByPivot('order_num');
    }
}
