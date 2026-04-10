<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Routine extends Model
{
    //
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    protected $casts =[
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $appends= [
        'exercises',
    ];

    public function getExercisesAttribute()
{
    return $this->exercises()
        ->select(
            'exercises.id',
            'exercises.name',
            'exercises.description',
            'exercises.muscle_group',
            'exercises.equipment',
            'exercises.video_url'
        )
        ->get()
        ->map(function ($exercise) {
            return [
                'id' => $exercise->id,
                'name' => $exercise->name,
                'description' => $exercise->description,
                'muscle_group' => $exercise->muscle_group,
                'equipment' => $exercise->equipment,
                'video_url' => $exercise->video_url,
                'repetitions' => $exercise->pivot->repetitions,
                'sets' => $exercise->pivot->sets,
                'rest_time' => $exercise->pivot->rest_time
            ];
        });
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function exercises()
    {
        return $this->belongsToMany(Exercise::class, 'exercise_details')
            ->withPivot('repetitions', 'sets', 'rest_time')
            ->withTimestamps();
    }
}
