<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }

    /**
     * علاقة المستخدم بمشاريعه
     */
    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class);
    }

    /**
     * علاقة المستخدم بالتوثيقات
     */
    public function documentations()
    {
        return $this->hasMany(\App\Models\Documentation::class);
    }

    /**
     * علاقة المستخدم بسجل التوثيقات
     */
    public function documentHistories()
    {
        return $this->hasMany(\App\Models\DocumentHistory::class);
    }

    /**
     * تحقق من كون المستخدم admin
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
