<?php

namespace App\Repositories\Interfaces;

use App\Models\Course;
use Illuminate\Pagination\LengthAwarePaginator;

interface CourseRepositoryInterface
{
    public function getAllCourses(array $filters): LengthAwarePaginator;
    public function getCourseById(int $id): ?Course;
    public function createCourse(array $data): Course;
    public function updateCourse(int $id, array $data): Course;
    public function deleteCourse(int $id): bool;
}
