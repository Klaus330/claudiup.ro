<?php

use Illuminate\Database\Seeder;
use App\Category;
class CateogriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	collect([
    		'PHP',
    		"MySQL",
    		"JavaScript"
    	])->each(function($category){
    		factory(Category::class)->create([
    			'name' => $category
    		]);
    	});       
    }
}
