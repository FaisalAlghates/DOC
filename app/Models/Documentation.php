<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'purpose',
        'scope',
        'definitions',
        'overall_description',
        'product_perspective',
        'user_classes',
        'operating_environment',
        'constraints',
        'assumptions',
        'functional_requirements',
        'nonfunctional_requirements',
        'use_cases',
        'data_model',
        'interface_requirements',
        'appendices',
        'compliance_report',
        'database_tables',
        'ui_ux',
        'conclusion',
        'content',
        'code_files', // store as JSON array of file paths
    ];

    protected $casts = [
        'code_files' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
