<?php

namespace Ae3\Survey\app\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'forms.statuses';

    protected $fillable = [
        'name',
        'slug',
        'color'
    ];
}
