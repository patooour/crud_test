<?php

use App\Http\Controllers\Front\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

  Route::group([ 'prefix'=>'post','as'=>'post.'] , function (){
      Route::post('/', [PostController::class, 'create'])->name('create');
      Route::get('/all', [PostController::class, 'all'])->name('all');
      Route::get('/delete/{id}', [PostController::class, 'delete'])->name('delete');
      Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
      Route::post('/update/{id}', [PostController::class, 'update'])->name('update');
      Route::get('/posts', [PostController::class, 'allPosts'])->name('posts');
  });


    ############ Add comments to post ######################

    Route::post('/post/comment', [\App\Http\Controllers\front\CommentController::class, 'addComment'])->name('post.comment');
    Route::get('/delete/{id}', [\App\Http\Controllers\front\CommentController::class, 'deleteComment'])->name('comment.delete');


    });

Route::get('/send-mail', [\App\Http\Controllers\Mail\MailController::class, 'sendMail'])->name('send-mail');




