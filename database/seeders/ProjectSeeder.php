<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        $users = User::all();

        $users->each(function (User $user) use ($categories, $users) {
            $projects = Project::factory()
                ->count(random_int(1, 3))
                ->sequence([
                    'category_id' => $categories->random()->id,
                    'user_id' => $user->id,
                ])
                ->create();

            $projects->each(function (Project $project) use ($users) {
                $project->team()->syncWithoutDetaching($users->random());
                $project->team()->syncWithoutDetaching($users->random());
                $project->team()->syncWithoutDetaching($users->random());
            });
        });
    }
}
