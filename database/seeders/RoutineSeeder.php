<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Routine;
use Illuminate\Database\Seeder;

class RoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Routine::create([
            'name' => 'Upper Body Workout',
            'description' => 'Workout focused on chest, shoulders, and arms',
            'user_id' => 1
        ]);

        Routine::create([
            'name' => 'Leg Day',
            'description' => 'Workout focused on legs and glutes',
            'user_id' => 1
        ]);

        Routine::create([
            'name' => 'Full Body Beginner',
            'description' => 'Simple full body routine for beginners',
            'user_id' => 2
        ]);

        Routine::create([
            'name' => 'Cardio Routine',
            'description' => 'Routine for improving stamina',
            'user_id' => 3
        ]);
    }
}
