<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $semesters = config('semester.default');

        foreach($semesters as $semester) {
            Semester::create([
                'name' => $semester['name'],
                'code' => $semester['code']
            ]);
        }
    }
}
