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
        return $this->isGlobalFounder() || $this->isPersonalFounder();
    }

    /**
     * تحقق من كون المستخدم المؤسس العالمي (أول مستخدم في النظام)
     */
    public function isGlobalFounder()
    {
        $firstUser = static::orderBy('id')->first();
        return $firstUser && $this->id === $firstUser->id;
    }

    /**
     * تحقق من كون المستخدم مؤسس شخصي (في قاعدة البيانات الخاصة به)
     */
    public function isPersonalFounder()
    {
        return true; // كل مستخدم مؤسس في مساحته الشخصية
    }

    /**
     * تحقق من كون المستخدم مطور
     */
    public function isDeveloper()
    {
        return true; // كل مستخدم له صلاحيات مطور في مساحته الشخصية
    }

    /**
     * تحقق من إمكانية إنشاء المحتوى
     */
    public function canCreateContent()
    {
        return true; // كل مستخدم يمكنه إنشاء المحتوى في مساحته الشخصية
    }

    /**
     * تحقق من إمكانية إدارة المستخدمين (للمؤسس العالمي فقط)
     */
    public function canManageUsers()
    {
        return $this->isGlobalFounder();
    }

    /**
     * Get the role attribute mapped to application values
     */
    public function getRoleAttribute($value)
    {
        $roleMapping = [
            'owner' => 'admin',
            'developer' => 'admin',
            'viewer' => 'user'
        ];

        return $roleMapping[$value] ?? $value;
    }

    /**
     * Get the original database role value
     */
    public function getDatabaseRole()
    {
        return $this->attributes['role'] ?? null;
    }
}
