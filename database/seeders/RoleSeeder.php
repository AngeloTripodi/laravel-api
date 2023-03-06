<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                'name' => 'Admin',
                'level' => '1',
            ],
            [
                'name' => 'Moderator',
                'level' => '2',
            ],
            [
                'name' => 'Editor',
                'level' => '3',
            ],
            [
                'name' => 'Contributor',
                'level' => '4',
            ],
            [
                'name' => 'Guest',
                'level' => '5',
            ],
        ];

        foreach ($roles as $role) {
            $technology = new Role();
            $technology->name = $role['name'];
            $technology->level = $role['level'];
            $technology->save();
        }
    }
}
