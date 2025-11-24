<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupCondition extends Model
{
    protected $table = 'forms.group_conditions';

    protected $fillable = [
        'group_id',
        'max_age',
        'min_age',
        'nationality',
        'allowed_genre',
        'only_for_responsible_family',
        'required_if_new_record'
    ];

    /**
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
