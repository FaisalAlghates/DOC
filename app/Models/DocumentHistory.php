<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'documentation_id', 'user_id', 'action', 'changes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documentation()
    {
        return $this->belongsTo(Documentation::class);
    }
}
