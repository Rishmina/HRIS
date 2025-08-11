<?php

namespace Database\Factories;

use App\Models\Attendance;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    protected $model = Attendance::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'status' => $this->faker->randomElement(['present','absent']),
        ];
    }
}
