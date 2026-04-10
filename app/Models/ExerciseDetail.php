<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseDetail extends Model
{
    //
    protected $fillable = [
        'exercise_id',
        'routine_id',
        'repetitions',
        'sets',
        'rest_time',
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

    public function exercise(){
        return $this->belongsTo(Exercise::class);
    }

    public function routine()
    {
        return $this->belongsTo(Routine::class);
    }
}
