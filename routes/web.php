
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
Route::view('/home','home.index');
Route::get('/mole','HomeController@secret')->name('secret.game');

/**
* Pages Routes
*/
Route::post("/contact","MessageController@store")->name("contact.save");

Route::prefix("/messages")->group(function(){
	Route::get("/","MessageController@table")->name("messages.table");
	Route::get("/{message}","MessageController@show")->name("messages.show");
	Route::get('/reply/{message}','MessageController@replyForm')->name("message.replyForm");
	Route::post('/reply/{message}','MessageController@reply')->name('message.reply');
	Route::delete("/{id}","MessageController@delete")->name("messages.delete");
});

Route::get('project/book/{project}','BookProjectController@show')->name("show.book.project");

Route::prefix("/blog")->group(function(){
	Route::get("/","BlogController@index")->name('blog.home');
	Route::get("/{slug}","BlogController@showPost")->name("blog.show");
	Route::get("/tags/{tag}","TagController@index")->name("blog.tag");
});

Route::get("/tag/table","TagController@table")->name("tag.table");

// Admin routes
Auth::routes();
Route::get('/dashboard','DashboardController@index')->name('dashboard');

Route::prefix('/posts')->group(function(){
	Route::get("/","PostController@table")->name("posts.table");
	Route::get("/create","PostController@create")->name("posts.create");
	Route::post("/create","PostController@store")->name("posts.store");
	Route::get("/edit/{slug}","PostController@edit")->name("posts.edit");
	Route::patch("/edit/{slug}","PostController@update")->name("posts.update");
	Route::delete("/delete/{slug}","PostController@delete")->name("posts.delete");
});

Route::prefix('/comments')->group(function(){
	Route::get("/","CommentController@table")->name("comments.table");
	Route::post("/post/{post}","CommentController@store")->name("comments.store");
	Route::delete("/delete/{id}","CommentController@destroy")->name("comments.delete");
	Route::patch("/{id}","CommentController@validated")->name("comments.validate");
});

Route::resource('/category','CategoryController');

Route::resource('/tag','TagController');

Route::resource('/skill','SkillController');

Route::resource('/projects','ProjectController');

Route::get('/api/blog',"Api\PostController@index");
Route::get('/api/blog/{slug}',"Api\PostController@show");

//  Api Routes
Route::get('api/post/slug/{post}', 'Api\PostController@getPostSlug');
