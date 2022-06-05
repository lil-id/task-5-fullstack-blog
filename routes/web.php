<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Kholil",
        "email" => "holilhaqalim@gmail.com",
        "foto" => "readfile.jpeg"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        "title" => "All Categories",
        "active" => "category",
        "categories" => Category::all()
    ]);
});

Route::get('/categories/{category:id}', function(Category $category) {
    return view('category', [
        "title" => "Post by Category : $category->name",
        "active" => "category",
        "posts" => $category->posts->load('category', 'author')
    ]);
});

Route::get('/author/{author}', function(User $author) {
    return view('blog', [
        "title" => "Post by Author : $author->name",
        "active" => "blog",
        "posts" => $author->posts->load('category', 'author')
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');