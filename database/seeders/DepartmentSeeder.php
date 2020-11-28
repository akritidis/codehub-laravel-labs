<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Department::factory()->times(5)->create();

        $users = User::all();

        $users->each(function($user) use ($departments) {
            $ids = $departments->random(5)->pluck('id');

            $user->skills()->sync($ids);
        });
    }
}
