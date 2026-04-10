<?php

namespace App\Http\Controllers\Api;

use App\Models\ExerciseDetail;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;

class ExerciseDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */

    use ApiResponse, HasApiTokens, SoftDeletes;
    public function index()
    {
        $exerciseDetails = ExerciseDetail::query()->get();

        //Show only the exercise details that are not  deleted
        $exerciseDetails = $exerciseDetails->filter(function ($item) {
            return $item->deleted_at === null;
        })->values();

        if($exerciseDetails->isEmpty()){
            return $this->errorResponse('No exercise details found', 404);
        }
        return $this->successResponse($exerciseDetails, 'Exercise details retrieved successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'exercise_id' => 'required|exists:exercises,id',
            'routine_id' => 'required|exists:routines,id',
            'repetitions' => 'required|integer|min:0',
            'sets' => 'required|integer|min:0',
            'rest_time' => 'nullable|integer|min:0',
        ],[
            'exercise_id.required' => 'Exercise ID is required',
            'exercise_id.exists' => 'Exercise ID must exist in exercises table',
            'routine_id.required' => 'Routine ID is required',
            'routine_id.exists' => 'Routine ID must exist in routines table',
            'repetitions.required' => 'Repetitions is required',
            'repetitions.integer' => 'Repetitions must be an integer',
            'repetitions.min' => 'Repetitions must be at least 0',
            'sets.required' => 'Sets is required',
            'sets.integer' => 'Sets must be an integer',
            'sets.min' => 'Sets must be at least 0',
            'rest_time.integer' => 'Rest time must be an integer',
            'rest_time.min' => 'Rest time must be at least 0',
        ]);

        $exerciseDetail = ExerciseDetail::create([
            'exercise_id' => $validated['exercise_id'],
            'routine_id' => $validated['routine_id'],
            'repetitions' => $validated['repetitions'],
            'sets' => $validated['sets'],
            'rest_time' => $validated['rest_time'] ?? null,
        ]);

        return $this->successResponse($exerciseDetail, 'Exercise detail created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExerciseDetail $exerciseDetail)
    {
        if ($exerciseDetail->deleted_at !== null) {
            return $this->errorResponse('Exercise detail not found', 404);
        }
        return $this->successResponse($exerciseDetail, 'Exercise detail retrieved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExerciseDetail $exerciseDetail)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExerciseDetail $exerciseDetail)
    {

        $validated = request()->validate([
            'exercise_id' => 'sometimes|exists:exercises,id',
            'routine_id' => 'sometimes|exists:routines,id',
            'repetitions' => 'sometimes|integer|min:0',
            'sets' => 'sometimes|integer|min:0',
            'rest_time' => 'nullable|integer|min:0',
        ],[
            'exercise_id.required' => 'Exercise ID is required',
            'exercise_id.exists' => 'Exercise ID must exist in exercises table',
            'routine_id.required' => 'Routine ID is required',
            'routine_id.exists' => 'Routine ID must exist in routines table',
            'repetitions.required' => 'Repetitions is required',
            'repetitions.integer' => 'Repetitions must be an integer',
            'repetitions.min' => 'Repetitions must be at least 0',
            'sets.required' => 'Sets is required',
            'sets.integer' => 'Sets must be an integer',
            'sets.min' => 'Sets must be at least 0',
            'rest_time.integer' => 'Rest time must be an integer',
            'rest_time.min' => 'Rest time must be at least 0',
        ]);

        $exerciseDetail = ExerciseDetail::query()->find($request->id);
        if (!$exerciseDetail) {
            return $this->errorResponse('Exercise detail not found', 404);
        }
        $exerciseDetail->update($validated);
        return $this->successResponse($exerciseDetail, 'Exercise detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExerciseDetail $exerciseDetail)
    {
        $exerciseDetail = ExerciseDetail::query()->find($exerciseDetail->id);
        if (!$exerciseDetail) {
            return $this->errorResponse('Exercise detail not found', 404);
        }
        $exerciseDetail->delete();
        return $this->successResponse(null, 'Exercise detail deleted successfully');
    }
}
