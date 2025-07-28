<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestPracticeDocumentation extends Model
{
    use HasFactory;
    protected $table = 'best_practice_documentations';
    protected $guarded = [];

    public function documentation()
    {
        return $this->belongsTo(\App\Models\Documentation::class);
    }
}
