<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'headline',
        'hero_description',
        'photo',
        'about_photo',
        'about',
        'email',
        'github_url',
        'linkedin_url',
    ];
}