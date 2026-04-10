<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Routine;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Testing\Fluent\Concerns\Has;
use Laravel\Sanctum\HasApiTokens;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use HasApiTokens, SoftDeletes, ApiResponse;
    public function index()
    {
        //
        $routines = Routine::query()->get();

        //Show only the exercise that are not  deleted
        $routines = $routines->filter(function ($item) {
            return $item->deleted_at === null && $item->user_id === auth()->id();
        })->values();

        if($routines->isEmpty()){
            return $this->errorResponse('No routines found', 404);
        }
        return $this->successResponse($routines, 'Routines retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ],[
            'name.required' => 'Name is required',
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not exceed 255 characters',
            'description.string' => 'Description must be a string',
        ]);

        $routines = Routine::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'user_id' => auth()->id(),
        ]);

        return $this->successResponse($routines, 'Routine created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $routine = Routine::query()->find($id);

        $routine = $routine->filter(function ($item) {
            return $item->deleted_at === null && $item->user_id === auth()->id();
        })->first();

        if (!$routine) {
            return $this->errorResponse('Routine not found', 404);
        }

        return $this->successResponse($routine, 'Routine retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $routine = Routine::query()->find($id);

        if (!$routine || $routine->deleted_at !== null || $routine->user_id !== auth()->id()) {
            return $this->errorResponse('Routine not found', 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
        ],[
            'name.string' => 'Name must be a string',
            'name.max' => 'Name must not exceed 255 characters',
            'description.string' => 'Description must be a string',
        ]);

        $routine->update($validated);

        return $this->successResponse($routine, 'Routine updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $routine = Routine::query()->find($id);
        if (!$routine || $routine->deleted_at !== null || $routine->user_id !== auth()->id()) {
            return $this->errorResponse('Routine not found', 404);
        }

        $routine->delete();
        return $this->successResponse(null, 'Routine deleted successfully');
    }
}
