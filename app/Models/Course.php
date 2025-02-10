<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'instructor_id',
        'category_id',
        'difficulty_level_id',
        'format_id',
        'popularity_status_id',
        'duration',
        'rating',
        'certification',
        'release_date',
        'tags'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function difficultyLevel()
    {
        return $this->belongsTo(DifficultyLevel::class);
    }

    public function format()
    {
        return $this->belongsTo(CourseFormat::class);
    }

    public function popularity()
    {
        return $this->belongsTo(Popularity::class, 'popularity_status_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
