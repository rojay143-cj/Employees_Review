<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $table = 'employees';

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'position',
        'department',
    ];
    public function documents()
    {
        return $this->hasMany(employee_documents::class, 'employee_id');
    }
}
