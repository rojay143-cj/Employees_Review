<?php

namespace App\Models;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $table = 'reviews';
    
    protected $fillable = [
        'employee_id',
        'review_template_id',
        'review_date',
        'comments',
        'rating',
        'status',
    ];
    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }

    public function template()
    {
        return $this->belongsTo(review_templates::class, 'template_id');
    }
}
