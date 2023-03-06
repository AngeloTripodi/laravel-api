<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        $users = User::all();

        $roles = Role::all()->pluck('id');

        foreach ($users as $user) {
            $elements = $faker->randomElements($roles, 2);
            $user->roles()->sync($elements);
        }
    }
}
