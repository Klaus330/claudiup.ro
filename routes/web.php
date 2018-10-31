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

Route::prefix("/messages")->group(function(){
	Route::get("/","MessageController@table")->name("messages.table");
	Route::get("/{id}","MessageController@show")->name("messages.show");
	Route::delete("/{id}","MessageController@delete")->name("messages.delete");
});
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

// Comment routes
Route::prefix('/comments')->group(function(){
	Route::get("/","CommentController@table")->name("comments.table");
	Route::post("/post/{slug}","CommentController@store")->name("comments.store");
	Route::delete("/delete/{id}","CommentController@destroy")->name("comments.delete");
	Route::patch("/{id}","CommentController@validated")->name("comments.validate");
});

Route::resource('/category','CategoryController');

Route::get("/tag/table","TagController@table")->name("tag.table");
Route::resource('/tag','TagController');

Route::resource('/skill','SkillController');

Route::resource('/projects','ProjectController');
