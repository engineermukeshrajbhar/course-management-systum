<?php

namespace App\Repositories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;

class CourseRepository implements CourseRepositoryInterface {

    public function getAllCourses($filters) {
        return Course::with(['category', 'instructor', 'difficultyLevel', 'format', 'popularity'])
            ->when(isset($filters['category']), fn (Builder $q) => $q->whereHas('category', fn ($q) => $q->where('name', $filters['category'])))
            ->when(isset($filters['difficulty_level']), fn (Builder $q) => $q->whereHas('difficultyLevel', fn ($q) => $q->where('level', $filters['difficulty_level'])))
            ->when(isset($filters['format']), fn (Builder $q) => $q->whereHas('format', fn ($q) => $q->where('format', $filters['format'])))
            ->when(isset($filters['certification']), fn (Builder $q) => $q->where('certification', $filters['certification']))
            ->when(isset($filters['price_min']), fn (Builder $q) => $q->where('price', '>=', $filters['price_min']))
            ->when(isset($filters['price_max']), fn (Builder $q) => $q->where('price', '<=', $filters['price_max']))
            ->when(isset($filters['rating']), fn (Builder $q) => $q->where('rating', '>=', $filters['rating']))
            ->paginate(10);
    }

    public function getCourseById($id) {
        return Course::with(['category', 'instructor', 'difficultyLevel', 'format', 'popularity'])->findOrFail($id);
    }

    public function createCourse(array $data) {
        return Course::create($data);
    }

    public function updateCourse($id, array $data) {
        $course = Course::findOrFail($id);
        $course->update($data);
        return $course;
    }

    public function deleteCourse($id) {
        return Course::destroy($id);
    }
}
