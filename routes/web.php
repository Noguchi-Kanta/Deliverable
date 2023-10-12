<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Route;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Route::get('/posts/search', [PostController::class, 'search'])->name('search');

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/posts/create', 'create')->name('create');
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/search', 'search')->name('search');
    Route::get('/posts/{post}', 'show')->name('show');
    Route::delete('/posts/{post}', 'delete')->name('delete');
});
    

Route::resource('comment', 'CommentController', ['only' => ['']]);
Route::post('/{post}/comment', [CommentController::class, 'comment'])->name('comment')->middleware('auth');
//Route::get('/posts/search', [PostController::class, 'search'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function() {
    Route::group(['prefix'=>'posts/{id}'],function(){
       Route::post('like',[LikeController::class, 'store'])->name('likes.like');
       Route::delete('unlike',[LikeController::class, 'destroy'])->name('likes.unlike');
    });
});

require __DIR__.'/auth.php';
