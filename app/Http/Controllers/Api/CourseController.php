<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Repositories\Interfaces\CourseRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CourseController extends Controller
{
    private $courseRepository;

    public function __construct(CourseRepositoryInterface $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index(Request $request)
    {
        $courses = $this->courseRepository->getAllCourses($request->all());
        return response()->json($courses);
    }

    public function show($id)
    {
        $course = $this->courseRepository->getCourseById($id);
        return response()->json($course);
    }

    public function store(CourseRequest $request)
    {
        $validated = $request->validated();
        $course = $this->courseRepository->createCourse($validated);

        return response()->json([
            'message' => 'Course created successfully',
            'course' => $course
        ], 201);
    }

    public function update(CourseRequest $request, $id)
    {
        $course = $this->courseRepository->updateCourse($id, $request->validated());
        return response()->json(['message' => 'Course updated successfully', 'course' => $course]);
    }

    public function destroy($id)
    {
        $this->courseRepository->deleteCourse($id);
        return response()->json(['message' => 'Course deleted successfully'], 200);
    }
}
