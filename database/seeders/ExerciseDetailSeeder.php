<?php

namespace Database\Seeders;

use App\Models\ExerciseDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ExerciseDetail::insert(
            [
                'routine_id' => 1,
                'exercise_id' => 1,
                'repetitions' => '10',
                'sets' => '4',
                'rest_time' => '90s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 1,
                'exercise_id' => 2,
                'repetitions' => '12',
                'sets' => '3',
                'rest_time' => '60s',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 2,
                'repetitions' => '10',
                'sets' => '4',
                'rest_time' => '120s',
                'exercise_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 2,
                'repetitions' => '12',
                'sets' => '3',
                'rest_time' => '60s',
                'exercise_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'routine_id' => 4,
                'repetitions' => '2 minutes',
                'sets' => '5',
                'rest_time' => '30s',
                'exercise_id' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]);
    }
}
