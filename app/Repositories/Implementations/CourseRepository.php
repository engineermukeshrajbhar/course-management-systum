<?php

namespace App\Repositories\Implementations;

use App\Models\Course;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseRepository implements CourseRepositoryInterface
{
    public function getAllCourses(array $filters): LengthAwarePaginator
    {
        $query = Course::with(['instructor', 'category', 'difficultyLevel', 'format', 'popularity']);

        // Apply filters
        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }
        if (!empty($filters['difficulty_level_id'])) {
            $query->where('difficulty_level_id', $filters['difficulty_level_id']);
        }
        if (!empty($filters['format_id'])) {
            $query->where('format_id', $filters['format_id']);
        }
        if (!empty($filters['min_price'])) {
            $query->where('price', '>=', $filters['min_price']);
        }
        if (!empty($filters['max_price'])) {
            $query->where('price', '<=', $filters['max_price']);
        }
        if (!empty($filters['sort_by'])) {
            $query->orderBy($filters['sort_by'], $filters['sort_order'] ?? 'asc');
        }

        return $query->paginate(10);
    }

    public function getCourseById(int $id): ?Course
    {
        return Course::with(['instructor', 'category', 'difficultyLevel', 'format', 'popularity'])->findOrFail($id);
    }

    public function createCourse(array $data): Course
    {
        return Course::create($data);
    }

    public function updateCourse(int $id, array $data): Course
    {
        $course = Course::findOrFail($id);
        $course->update($data);
        return $course;
    }

    public function deleteCourse(int $id): bool
    {
        $course = Course::findOrFail($id);
        return $course->delete();
    }
}
