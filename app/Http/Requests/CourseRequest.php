<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CourseRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to send the request
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            //'instructor_id' => 'required|exists:instructors,id',
            'category_id' => 'required|exists:categories,id',
            'difficulty_level_id' => 'required|exists:difficulty_levels,id',
            'format_id' => 'required|exists:course_formats,id',
            'duration' => 'required|integer|min:1',
            'rating' => 'nullable|numeric|min:0|max:5',
            'certification' => 'required|boolean',
            'release_date' => 'nullable|date',
            'tags' => 'nullable',
            'popularity_status_id'=>'nullable'
        ];
    }

    // Custom error response
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'ERROR',
            'messages' => $validator->errors(),
            'code' => 'validation_error',
            'data' => null
        ], 422));
    }
}
