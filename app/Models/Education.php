<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'degree',
        'institution',
        'start_year', 
        'end_year',
        'current',
        'description'
    ];

    protected $casts = [
        'current' => 'boolean'
    ];
}