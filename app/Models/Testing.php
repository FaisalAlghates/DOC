<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testing extends Model
{
    use HasFactory;
    protected $fillable = [
        'documentation_id',
        'test_type',
        'test_description',
        'test_results',
        'test_case_id',
        'test_case_description',
        'created_by',
        'revised_by',
        'priority',
        'tester_name',
        'date_tested',
        'test_execution_status',
        'prerequisites',
        'steps',
    ];

    protected $casts = [
        'steps' => 'array',
        'prerequisites' => 'array',
        'date_tested' => 'date',
    ];

    public function documentation()
    {
        return $this->belongsTo(Documentation::class);
    }
}
