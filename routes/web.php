<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('front.layouts.app');
// });

Route::get('/register',[UserController::class,'register'])->name('user.register');
Route::post('/register',[UserController::class,'storeUser'])->name('user.store');


//admin panel routes

Route::get('/login',[UserController::class,'index'])->name('login');
Route::post('/login',[UserController::class,'login'])->name('admin.login');


Route::middleware(['auth.middleware'])->group(function () {
Route::prefix('admin')->group(function () {

Route::get('/dashboard',[UserController::class, 'dashboard'])->name('show.dashboard');
Route::get('/logout',[UserController::class, 'logout'])->name('admin.logout');


// Route For Category//

Route::get('category/create/',[CategoryController::class, 'create'])->name('category.create');
Route::post('category/store/',[CategoryController::class, 'store'])->name('category.store');
Route::get('category/list/',[CategoryController::class, 'list'])->name('category.list');
Route::get('category/delete/{id}',[CategoryController::class, 'delete'])->name('category.delete');
Route::get('category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}',[CategoryController::class, 'update'])->name('category.update');


///Route for Tag

Route::get('tag/create/',[TagController::class, 'create'])->name('tag.create');
Route::post('tag/store/',[TagController::class, 'store'])->name('tag.store');
Route::get('tag/list/',[TagController::class, 'list'])->name('tag.list');
Route::get('tag/delete/{id}',[TagController::class, 'delete'])->name('tag.delete');
Route::get('tag/edit/{id}',[TagController::class, 'edit'])->name('tag.edit');
Route::post('tag/update/{id}',[TagController::class, 'update'])->name('tag.update');



///Route for post

Route::get('post/create/',[PostController::class, 'create'])->name('post.create');
Route::post('post/store/',[PostController::class, 'store'])->name('post.store');
Route::get('post/list/',[PostController::class, 'list'])->name('post.list');
Route::get('post/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
Route::get('post/delete/{id}',[PostController::class, 'delete'])->name('post.delete');
Route::post('post/update/{id}',[PostController::class, 'update'])->name('post.update');

});

});


// frontend routes

Route::get('/',[BlogController::class, 'index'])->name('home');
Route::get('/blog/single/{id}',[BlogController::class,'singlePage'])->name('single.blog');
Route::get('/logout',[UserController::class, 'frontLogout'])->name('front.logout');

//comment
Route::post('/blog/comment/',[CommentController::class,'storeComment'])->name('comment.store');
Route::post('/blog/comment/reply',[CommentController::class,'storeCommentReply'])->name('comment.reply.store');


