<?php

use App\Http\Controllers\CategoryController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;

//route for category
  Route::get('/categories',[CategoryController::class,'index'])->name('categories');
    Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
    Route::get('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
//products
Route::get('/products', [ProductController::class, 'index'])->name('posts');
Route::get('/product/trashed', [ProductController::class,'trashed'])->name('post.trashed');
Route::get('/product/hdelete/{id}', [ProductController::class,'hdelete'])->name('post.hdelete');
Route::get('/product/restore/{id}', [ProductController::class,'restore'])->name('post.restore');
Route::get('/pproductost/edit/{id}', [ProductController::class,'edit'])->name('post.edit');
Route::post('/product/update/{id}', [ProductController::class,'update'])->name('post.update');
Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
Route::post('/product/store', [ProductController::class,'store'])->name('post.store');
Route::get('/product/delete/{id}', [ProductController::class,'destroy'])->name('post.delete');

//users
Route::get('/users', [UserController::class,'index'])->name('users');
Route::get('/user/delete/{id}', [UserController::class,'destroy'])->name('users.delete');

Route::get('/users/admin/{id}',  [UserController::class,'admin'])->name('users.admin'); //->middleware('admin');
Route::get('/users/notadmin/{id}',  [UserController::class,'notAdmin'])->name('users.not.admin');
//tags
Route::get('/tags', [TagController::class,'index'])->name('tags');
Route::get('/tag/edit/{id}',[TagController::class,'edit'])->name('tag.edit');
Route::get('/tag/delete/{id}', [TagController::class,'destroy'])->name('tag.delete');
Route::get('/tag/create', [TagController::class,'create'])->name('tag.create');
Route::post('/tag/store', [TagController::class,'store'])->name('tag.store');
Route::post('/tag/update/{id}', [TagController::class,'update'])->name('tag.update');
