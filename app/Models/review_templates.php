<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review_templates extends Model
{
    protected $table = 'review_templates';

    protected $fillable = [
        'title',
        'description',
    ];
}
