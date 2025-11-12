<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'project_url',
        'github_url',
        'technologies',
        'featured'
    ];

    protected $casts = [
        'featured' => 'boolean'
    ];

    public function getTechnologiesArrayAttribute()
    {
        return explode(',', $this->technologies);
    }
}