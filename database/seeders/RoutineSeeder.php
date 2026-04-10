<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Routine;

class RoutineSeeder extends Seeder
{
    public function run(): void
    {
        $routines = [

            [
                'name' => 'Upper Body Workout',
                'description' => 'Workout focused on chest, shoulders, and arms',
                'user_id' => 1
            ],

            [
                'name' => 'Lower Body Workout',
                'description' => 'Workout focused on legs and glutes',
                'user_id' => 1
            ],

            [
                'name' => 'Push Day',
                'description' => 'Workout targeting chest, shoulders, and triceps',
                'user_id' => 2
            ],

            [
                'name' => 'Pull Day',
                'description' => 'Workout targeting back and biceps',
                'user_id' => 2
            ],

            [
                'name' => 'Leg Day',
                'description' => 'Workout focused on quadriceps, hamstrings, and glutes',
                'user_id' => 3
            ],

            [
                'name' => 'Full Body Workout',
                'description' => 'Workout targeting the entire body',
                'user_id' => 3
            ]

        ];

        foreach ($routines as $routine) {
            Routine::create($routine);
        }
    }
}
