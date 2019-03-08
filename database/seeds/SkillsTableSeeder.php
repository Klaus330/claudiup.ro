<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::truncate();

        collect([

            [
                'name' => 'PHP',
                'level' => 4
            ],

            [
                'name' => 'Laravel',
                'level' => 4
            ],

            [
                'name' => 'JavaScript',
                'level' => 2
            ],

            [
                'name' => 'MySQL',
                'level' => 3
            ],

            [
                'name' => 'Android Development',
                'level' => 2
            ],

            [
                'name' => 'Photoshop',
                'level' => 3
            ],

            [
                'name' => 'Premiere',
                'level' => 3
            ],

            [
                'name' => 'InDesign',
                'level' => 3
            ]
        ])->each(function ($skill) {
            factory(Skill::class)->create([
                'name' => $skill['name'],
                'experience_level' => $skill['level']
            ]);
        });
    }
}
