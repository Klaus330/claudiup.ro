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
        factory(Skill::class,10)->create();
    }
}
