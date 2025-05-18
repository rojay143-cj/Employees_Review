<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review_criteria extends Model
{
    protected $table = 'review_criteria';

    protected $fillable = [
        'name',
        'description',
        'review_template_id',
        'created_at',
        'updated_at'
    ];
}
