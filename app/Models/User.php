<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'professional_title',
        'email',
        'password',
        'is_admin',
        'photo',
        'bio',
        'phone',
        'location',
        'website',
        'linkedin',
        'github',
        'twitter',
        'profile_public',        
        'skills_public',         
        'projects_public',       
        'experiences_public',    
        'educations_public',     
        'last_updated',          
        'portfolio_updated_at',  
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
            'is_admin' => 'boolean',
            'profile_public' => 'boolean',     
            'skills_public' => 'boolean',      
            'projects_public' => 'boolean',    
            'experiences_public' => 'boolean', 
            'educations_public' => 'boolean', 
        ];
    }

    // Accessor untuk photo URL
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/' . $this->photo);
        }
        return asset('images/default-avatar.png');
    }
}