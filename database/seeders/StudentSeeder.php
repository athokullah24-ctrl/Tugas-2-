<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Seed data dummy mahasiswa.
     */
    public function run(): void
    {
        Student::factory()->count(10)->create();
    }
}
