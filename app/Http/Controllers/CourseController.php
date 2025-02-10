<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\DifficultyLevel;
use App\Models\CourseFormat;
use App\Models\Popularity;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        $query = Course::query()->with(['category', 'difficultyLevel', 'format', 'popularity', 'reviews']);
        // Category Filter
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        // Add average rating calculation
        $query->withAvg('reviews', 'rating');

        if ($request->has('ratings')) {
            $query->having(function ($q) use ($request) {
                foreach ($request->ratings as $rating) {
                    switch ($rating) {
                        case '4':
                            $q->orHaving('reviews_avg_rating', '>=', 4);
                            break;
                        case '3':
                            $q->orHaving('reviews_avg_rating', '>=', 3)
                                ->where('reviews_avg_rating', '<', 4);
                            break;
                        case '2':
                            $q->orHaving('reviews_avg_rating', '<', 3);
                            break;
                    }
                }
            });
        }

        // Price Filter
        if ($request->has('price')) {
            if ($request->price === 'free') {
                $query->where('price', 0);
            } elseif ($request->price === 'paid') {
                $query->where('price', '>', 0);
            }
        }

        // Difficulty Level Filter
        if ($request->has('difficulty_level_id')) {
            $query->whereIn('difficulty_level_id', $request->difficulty_level_id);
        }
        if ($request->has('popularity')) {
            $query->whereHas('popularity', function ($q) use ($request) {
                $q->whereIn('id', $request->popularity);
            });
        }



        // Duration Filter (example implementation - adjust according to your data structure)

        if ($request->has('duration')) {
            $query->where(function ($q) use ($request) {
                foreach ($request->duration as $duration) {
                    switch ($duration) {
                        case '2h':
                            // 2 hours = 120 minutes
                            $q->orWhere('duration', '<', 120);
                            break;
                        case '2-5h':
                            // 2-5 hours = 120-300 minutes
                            $q->orWhereBetween('duration', [120, 300]);
                            break;
                        case '5-10h':
                            // 5-10 hours = 300-600 minutes
                            $q->orWhereBetween('duration', [300, 600]);
                            break;
                        case '10h+':
                            // More than 10 hours = 600+ minutes
                            $q->orWhere('duration', '>', 600);
                            break;
                    }
                }
            });
        }

        if ($request->has('certification')) {
            $query->where(function ($q) use ($request) {
                if (in_array('available', $request->certification)) {
                    $q->orWhere('certification_available', true);
                }
                if (in_array('none', $request->certification)) {
                    $q->orWhere('certification_available', false);
                }
            });
        }

        // Add other filters similarly...

        $courses = $query->paginate(10);

        $categories = Category::all();
        $difficultyLevels = DifficultyLevel::all();
        $courseFormats = CourseFormat::all();
        $popularities = Popularity::all();

        return view('frontend.course.index', compact('courses', 'categories', 'difficultyLevels', 'courseFormats', 'popularities'));
    }


    // public function index(Request $request)
    // {
    //     // Fetch filter options
    //     $categories = Category::all();
    //     $difficultyLevels = DifficultyLevel::all();
    //     $courseFormats = CourseFormat::all();
    //     $popularities = Popularity::all();


    //     // Fetch courses based on filters
    //     $query = Course::query();

    //     if ($request->has('category_id') && $request->category_id != '') {
    //         $query->where('category_id', $request->category_id);
    //     }

    //     if ($request->has('difficulty_level_id') && $request->difficulty_level_id != '') {
    //         $query->where('difficulty_level_id', $request->difficulty_level_id);
    //     }

    //     if ($request->has('format_id') && $request->format_id != '') {
    //         $query->where('format_id', $request->format_id);
    //     }

    //     if ($request->has('popularity_id') && $request->popularity_id != '') {
    //         $query->where('popularity_id', $request->popularity_id);
    //     }

    //     // Add more filters as needed...˝

    //     $courses = $query->get();

    //     return view('frontend.course.index', compact('categories', 'difficultyLevels', 'courseFormats', 'popularities', 'courses'));
    // }



}
