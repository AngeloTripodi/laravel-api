<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\UserDetail;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TypeTableSeeder::class,
            TechnologySeeder::class,
            UserSeeder::class,
            UserDetailSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            ProjectsTableSeeder::class,
            ProjectTechnologySeeder::class,

        ]);
    }
}
