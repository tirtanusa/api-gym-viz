<?php

namespace Database\Seeders;

use App\Models\ExerciseDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciseDetailSeeder extends Seeder
{
    public function run(): void
    {
        $details = [

            // Upper Body Workout
            [
                'routine_id' => 1,
                'exercise_id' => 1, // Bench Press
                'repetitions' => '10',
                'sets' => '4',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 1,
                'exercise_id' => 2, // Incline Dumbbell Press
                'repetitions' => '10',
                'sets' => '3',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 1,
                'exercise_id' => 6, // Shoulder Press
                'repetitions' => '12',
                'sets' => '3',
                'rest_time' => '60s',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Lower Body Workout
            [
                'routine_id' => 2,
                'exercise_id' => 8, // Squat
                'repetitions' => '10',
                'sets' => '4',
                'rest_time' => '120s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 2,
                'exercise_id' => 9, // Lunges
                'repetitions' => '12',
                'sets' => '3',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Push Day
            [
                'routine_id' => 3,
                'exercise_id' => 1, // Bench Press
                'repetitions' => '8',
                'sets' => '4',
                'rest_time' => '120s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 3,
                'exercise_id' => 6, // Shoulder Press
                'repetitions' => '10',
                'sets' => '3',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 3,
                'exercise_id' => 3, // Push Up
                'repetitions' => '15',
                'sets' => '3',
                'rest_time' => '60s',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Pull Day
            [
                'routine_id' => 4,
                'exercise_id' => 4, // Pull Up
                'repetitions' => '8',
                'sets' => '4',
                'rest_time' => '120s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 4,
                'exercise_id' => 5, // Barbell Row
                'repetitions' => '10',
                'sets' => '4',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 4,
                'exercise_id' => 10, // Bicep Curl
                'repetitions' => '12',
                'sets' => '3',
                'rest_time' => '60s',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Leg Day
            [
                'routine_id' => 5,
                'exercise_id' => 8, // Squat
                'repetitions' => '8',
                'sets' => '4',
                'rest_time' => '120s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 5,
                'exercise_id' => 9, // Lunges
                'repetitions' => '12',
                'sets' => '4',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // Full Body Workout
            [
                'routine_id' => 6,
                'exercise_id' => 1, // Bench Press
                'repetitions' => '10',
                'sets' => '3',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 6,
                'exercise_id' => 4, // Pull Up
                'repetitions' => '8',
                'sets' => '3',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 6,
                'exercise_id' => 8, // Squat
                'repetitions' => '10',
                'sets' => '3',
                'rest_time' => '120s',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ];

        DB::table('exercise_details')->insert($details);
    }
}
