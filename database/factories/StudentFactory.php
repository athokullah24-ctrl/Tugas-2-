<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'  => fake()->name(),
            'nim'   => fake()->unique()->numerify('2310#####'),
            'major' => fake()->randomElement([
                'Sistem Informasi',
                'Informatika',
                'Teknik Industri',
                'Manajemen',
            ]),
        ];
    }
}
