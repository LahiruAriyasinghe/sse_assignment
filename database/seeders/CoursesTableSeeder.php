<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\Courses;
class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Courses::create([
            'name' => 'Artificial Intelligence',
            'category' => 'AI',
            'thumbnail' => 'https://cdn-icons-png.flaticon.com/512/4762/4762311.png',
            'description' => 'Sample Course 1'
        ]);

        Courses::create([
            'name' => 'Mobile App Development',
            'category' => 'IT',
            'thumbnail' => 'https://cdn-icons-png.flaticon.com/512/4762/4762311.png',
            'description' => 'Sample Course 2'
        ]);

        Courses::create([
            'name' => 'Cloud Development',
            'category' => 'AI',
            'thumbnail' => 'https://cdn-icons-png.flaticon.com/512/4762/4762311.png',
            'description' => 'Sample Course 1'
        ]);

        Courses::create([
            'name' => 'Website Development',
            'category' => 'IT',
            'thumbnail' => 'https://cdn-icons-png.flaticon.com/512/4762/4762311.png',
            'description' => 'Sample Course 4'
        ]);
    }
}
