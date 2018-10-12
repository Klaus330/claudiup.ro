<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/','home.index')->name('home');

Auth::routes();

Route::get('/dashboard','DashboardController@index')->name('dashboard');


/**
* Pages Routes
*/
Route::post("/contact","MessageController@store")->name("contact.save");

Route::get("/messages","MessageController@table")->name("messages.table");
Route::get("/messages/{id}","MessageController@show")->name("messages.show");
Route::delete("/messages/{id}","MessageController@delete")->name("messages.delete");


// Blog routes
Route::prefix("/blog")->group(function(){
	Route::get("/","BlogController@index")->name('blog.home');
	Route::get("/{slug}","BlogController@showPost")->name("blog.show");
	Route::get("/tags/{tag}","TagController@index")->name("blog.tag");
});

// Posts routes
Route::prefix('/posts')->group(function(){
	Route::get("/","PostController@table")->name("posts.table");
	Route::get("/create","PostController@create")->name("posts.create");
	Route::post("/create","PostController@store")->name("posts.store");
	Route::get("/edit/{slug}","PostController@edit")->name("posts.edit");
	Route::patch("/edit/{slug}","PostController@update")->name("posts.update");
	Route::delete("/delete/{slug}","PostController@delete")->name("posts.delete");
});

// Categories routes
Route::prefix("/category")->group(function(){
	Route::get("/","CategoryController@table")->name("categories.table");
	Route::post("/create","CategoryController@store")->name("category.store");
	Route::get("/edit/{id}","CategoryController@edit")->name("category.edit");
	Route::post("/edit/{id}","CategoryController@update")->name("category.update");
	Route::delete("/delete/{id}","CategoryController@destroy")->name("category.delete");
});

//Tags routes
Route::prefix('/tag')->group(function(){
	Route::get("/","TagController@table")->name("tags.table");
	Route::post("/store","TagController@store")->name("tags.store");
	Route::get("/edit/{id}","TagController@edit")->name("tags.edit");
	Route::patch("/edit/{id}","TagController@update")->name("tags.update");
	Route::delete("/delete/{id}","TagController@destroy")->name("tags.delete");
});

// Skills routes
Route::prefix('/skills')->group(function(){
	Route::get("/","SkillController@table")->name("skills.table");
	Route::post("/create","SkillController@store")->name("skills.store");
	Route::get("/edit/{id}","SkillController@edit")->name("skills.edit");
	Route::patch("/edit/{id}","SkillController@update")->name("skills.update");
	Route::delete("/delete/{id}","SkillController@destroy")->name("skills.delete");
});

// Comment routes
Route::prefix('/comments')->group(function(){
	Route::get("/","CommentController@table")->name("comments.table");
	Route::post("/create/{slug}","CommentController@store")->name("comments.store");
	Route::delete("/delete/{id}","CommentController@destroy")->name("comments.delete");
	Route::patch("/{id}","CommentController@validated")->name("comments.validate");
});


/**
* Project routes
*/
Route::prefix('/projects')->group(function(){
	Route::get("/","ProjectController@table")->name("projects.table");
	Route::get("/create","ProjectController@create")->name("project.create");
	Route::post("/create","ProjectController@store")->name("project.store");
	Route::get("/edit/{id}","ProjectController@edit")->name("project.edit");
	Route::patch("/edit/{id}","ProjectController@update")->name("project.update");
	Route::delete("/delete/{id}","ProjectController@delete")->name("project.delete");
});

