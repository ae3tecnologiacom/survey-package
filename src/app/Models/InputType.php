<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;

class InputType extends Model
{
    protected $table = 'forms.input_types';

    protected $fillable = [
        'name',
        'slug',
        'mask'
    ];
}
