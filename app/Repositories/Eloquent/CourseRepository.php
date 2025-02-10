<?php
namespace App\Repositories\Eloquent;

use App\Models\Course;
use App\Repositories\Contracts\CourseRepositoryInterface;

class CourseRepository implements CourseRepositoryInterface {

    public function getAll() {
        return Course::all();
    }

    public function getById($id) {
        return Course::find($id);
    }

    public function create(array $data) {
        return Course::create($data);
    }

    public function update($id, array $data) {
        $course = Course::findOrFail($id);
        $course->update($data);
        return $course;
    }

    public function delete($id) {
        return Course::destroy($id);
    }
}
