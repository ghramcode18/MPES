<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Routes;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[UserController::class, 'Register']);
Route::post('/login',[UserController::class, 'Login']);
Route::get('/logout/{id}',[UserController::class, 'Logout']);
Route::post('/edit_user/{id}',[UserController::class, 'EditUser']);//new

Route::post('/update/{id}',[ProductController::class, 'Update']);
Route::post('/addproduct',[ProductController::class, 'Add']);
Route::post('/addproduct2',[ProductController::class, 'Add']); // ghram
Route::get('/show details/{id}',[ProductController::class, 'ShowDetails']); //new
Route::get('/pagination',[ProductController::class, 'Pagination']);//new*2
Route::get('/user_product/{user_id}',[ProductController::class, 'UserProduct']);

Route::post('/addcomment',[CommentController::class, 'AddComment']);//new




