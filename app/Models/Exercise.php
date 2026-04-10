<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exercise extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'muscle_group',
        'equipment',
        'video_url',
    ];

    protected $casts =[
        'muscle_group' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    protected $hidden = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function exerciseDetails()
    {
        return $this->hasMany(ExerciseDetail::class);
    }
}
