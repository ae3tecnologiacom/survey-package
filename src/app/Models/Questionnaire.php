<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Questionnaire extends Model
{
    protected $table = 'forms.questionnaires';

    protected $fillable = [
        'name',
        'description',
        'slug',
        'address_required',
        'allow_address',
        'person_required',
        'allow_person',
        'enabled',
        'questionnaireable_type',
        'questionnaireable_id',
        'last_change',
    ];

    /**
     * @return MorphTo
     */
    public function questionnaireable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * @return HasMany
     */
    public function groups(): HasMany
    {
        return $this->hasMany(Group::class)
            ->orderBy('order_num');
    }

    /**
     * @return HasMany
     */
    public function surveys(): HasMany
    {
        return $this->hasMany(Survey::class);
    }
}
