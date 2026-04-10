<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Exercise;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $exercises = [
            [
                'name' => 'Bench Press',
                'description' => 'Compound chest exercise',
                'muscle_group' => [
                    'chest' => 3,
                    'triceps' => 2,
                    'shoulders' => 1
                ],
                'equipment' => 'Barbell',
                'video_url' => 'https://youtube.com/benchpress',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Incline Dumbbell Press',
                'description' => 'Upper chest focused press',
                'muscle_group' => [
                    'chest' => 3,
                    'shoulders' => 2,
                    'triceps' => 1
                ],
                'equipment' => 'Dumbbell',
                'video_url' => 'https://youtube.com/inclinepress',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Push Up',
                'description' => 'Bodyweight chest exercise',
                'muscle_group' => [
                    'chest' => 3,
                    'triceps' => 2,
                    'shoulders' => 1
                ],
                'equipment' => 'Bodyweight',
                'video_url' => 'https://youtube.com/pushup',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Pull Up',
                'description' => 'Upper body pulling movement',
                'muscle_group' => [
                    'back' => 3,
                    'biceps' => 2,
                    'shoulders' => 1
                ],
                'equipment' => 'Pull Up Bar',
                'video_url' => 'https://youtube.com/pullup',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Barbell Row',
                'description' => 'Compound back exercise',
                'muscle_group' => [
                    'back' => 3,
                    'biceps' => 2,
                    'shoulders' => 1
                ],
                'equipment' => 'Barbell',
                'video_url' => 'https://youtube.com/barbellrow',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Shoulder Press',
                'description' => 'Compound shoulder pressing exercise',
                'muscle_group' => [
                    'shoulders' => 3,
                    'triceps' => 2,
                    'chest' => 1
                ],
                'equipment' => 'Dumbbell',
                'video_url' => 'https://youtube.com/shoulderpress',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Lateral Raise',
                'description' => 'Isolation exercise for shoulders',
                'muscle_group' => [
                    'shoulders' => 3
                ],
                'equipment' => 'Dumbbell',
                'video_url' => 'https://youtube.com/lateralraise',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Barbell Squat',
                'description' => 'Compound lower body exercise',
                'muscle_group' => [
                    'quadriceps' => 3,
                    'glutes' => 2,
                    'hamstrings' => 1
                ],
                'equipment' => 'Barbell',
                'video_url' => 'https://youtube.com/squat',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Lunges',
                'description' => 'Single leg lower body exercise',
                'muscle_group' => [
                    'quadriceps' => 3,
                    'glutes' => 2,
                    'hamstrings' => 1
                ],
                'equipment' => 'Dumbbell',
                'video_url' => 'https://youtube.com/lunges',
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'name' => 'Bicep Curl',
                'description' => 'Isolation exercise for biceps',
                'muscle_group' => [
                    'biceps' => 3
                ],
                'equipment' => 'Dumbbell',
                'video_url' => 'https://youtube.com/bicepcurl',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];

        foreach ($exercises as $exercise) {
            Exercise::create($exercise);
        }
    }
}
