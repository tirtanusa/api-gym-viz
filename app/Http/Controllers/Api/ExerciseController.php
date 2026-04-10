<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exercise;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\SessionGuard;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HasApiTokens, SoftDeletes, ApiResponse;

    public function index()
    {
        $exercise = Exercise::query()->get();

        //Show only the exercise that are not  deleted
        $exercise = $exercise->filter(function ($item) {
            return $item->deleted_at === null;
        })->values();

        if($exercise->isEmpty()){
            return $this->errorResponse('No exercises found', 404);
        }
        return $this->successResponse($exercise, 'Exercise retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',

            'muscle_group' => 'required|array',
            'muscle_group.*' => 'integer|min:1|max:3',

            'equipment' => 'nullable|string',
            'video_url' => 'nullable|url',

            'routine_id' => 'nullable|exists:routines,id',
            'repetitions' => 'required|string',
            'sets' => 'required|string',
            'rest_time' => 'nullable|string',
        ], [
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not exceed 255 characters',
            'description.string' => 'Description must be a string',
            'muscle_group.required' => 'Muscle group is required',
            'muscle_group.array' => 'Muscle group must be an array',
            'muscle_group.*.integer' => 'Each muscle group must be an integer',
            'muscle_group.*.min' => 'Each muscle group must be a positive integer',
            'muscle_group.*.max' => 'Each muscle group must not exceed 3',
            'equipment.string' => 'Equipment must be a string',
            'video_url.url' => 'Video URL must be a valid URL',
            'routine_id.exists' => 'Routine ID must exist in routines table',
            'repetitions.required' => 'Repetitions is required',
            'repetitions.string' => 'Repetitions must be a string',
            'sets.required' => 'Sets is required',
            'sets.string' => 'Sets must be a string',
            'rest_time.string' => 'Rest time must be a string',
        ]);

        $allowedMuscle = config('muscle.list');

        $invalid = array_diff(
            array_keys($validated['muscle_group']),
            $allowedMuscle
        );

        if ($invalid) {
            return $this->errorResponse(
                'Invalid muscle detected: '.implode(',', $invalid),
                422
            );
        }

        $exercise = Exercise::create($validated);

        return $this->successResponse(
            $exercise,
            'Exercise created successfully',
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $exercise = Exercise::query()->find($id);
        if (!$exercise || $exercise->deleted_at !== null) {
            return $this->errorResponse('Exercise not found', 404);
        }
        return $this->successResponse($exercise, 'Exercise retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $exercise = Exercise::query()->find($id);
        if (!$exercise || $exercise->deleted_at !== null) {
            return $this->errorResponse('Exercise not found', 404);
        }
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'muscle_group' => 'required|array',
            'muscle_group.*' => 'integer|min:1',
            'equipment' => 'sometimes|string',
            'video_url' => 'sometimes|url',
        ],[
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not exceed 255 characters',
            'description.string' => 'Description must be a string',
            'muscle_group.required' => 'Muscle group is required',
            'muscle_group.array' => 'Muscle group must be an array',
            'muscle_group.*.integer' => 'Each muscle group must be an integer',
            'muscle_group.*.min' => 'Each muscle group must be a positive integer',
            'equipment.string' => 'Equipment must be a string',
            'video_url.url' => 'Video URL must be a valid URL',
        ]);

        $exercise->update($validated);
        return $this->successResponse($exercise, 'Exercise updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exercise = Exercise::query()->find($id);
        if (!$exercise || $exercise->deleted_at !== null) {
            return $this->errorResponse('Exercise not found', 404);
        }
        $exercise->delete();
        return $this->successResponse(null, 'Exercise deleted successfully');
    }
}
