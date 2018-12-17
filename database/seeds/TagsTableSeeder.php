<?php

use Illuminate\Database\Seeder;
use App\Tag;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
    	collect([
    		'PHP',
    		"MySQL",
    		"JavaScript"
    	])->each(function($tag){
    		factory(Tag::class)->create([
    			'name' => $tag
    		]);
    	});
    }
}
