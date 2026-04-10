<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Exercise;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Exercise::insert([
            [
                'name' => 'Bench Press',
                'description' => 'Chest strength exercise',
                'muscle_group' => 'Chest',
                'equipment' => 'Barbell',
                'video_url' => 'https://youtube.com/benchpress',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Shoulder Press',
                'description' => 'Shoulder strength exercise',
                'muscle_group' => 'Shoulders',
                'equipment' => 'Dumbbell',
                'video_url' => 'https://youtube.com/shoulderpress',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Squat',
                'description' => 'Leg compound exercise',
                'muscle_group' => 'Legs',
                'equipment' => 'Barbell',
                'video_url' => 'https://youtube.com/squat',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lunges',
                'description' => 'Leg balance exercise',
                'muscle_group' => 'Legs',
                'equipment' => 'Bodyweight',
                'video_url' => 'https://youtube.com/lunges',

                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Jump Rope',
                'description' => 'Cardio warmup exercise',
                'muscle_group' => 'Full Body',
                'equipment' => 'Jump Rope',
                'video_url' => 'https://youtube.com/jumprope',

                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
