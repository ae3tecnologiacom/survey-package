<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;

class FieldType extends Model
{
    protected $table = 'forms.field_types';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'allow_input_types',
    ];
}
