<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Python', 'C++', 'Java', 'HTML', 'JavaScript', 'CSS', 'PHP', 'Vue.Js', 'ReactJs', 'Angular.Js', 'Laravel'];

        foreach ($technologies as $technologyName) {
            $technology = new Technology();
            $technology->name = $technologyName;
            $technology->save();
        }
    }
}
