<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 50; $i++) {
            $newProject = new Project();
            $newProject->type_id = Type::inRandomOrder()->first()->id;
            $newProject->title = $faker->sentence(5);
            $newProject->author = $faker->name();
            $newProject->languages_used = $faker->text(5);
            $newProject->content = $faker->text(300);
            $newProject->project_date = $faker->dateTimeThisYear();
            $newProject->image = $faker->imageUrl();
            // $newProject->image = 'plc.webp';
            $newProject->save();
        }
    }
}
