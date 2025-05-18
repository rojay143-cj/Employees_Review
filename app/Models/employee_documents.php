<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employee_documents extends Model
{
    protected $table = 'employee_documents';

    protected $fillable = [
        'employee_id',
        'document_name',
        'file_path',
        'file_type',
        'category',
    ];
}
