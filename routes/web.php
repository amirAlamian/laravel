<?php

// use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', "TestController@test2");

// Route::get('/test/{id}/{author?}', [TestController::class, 'test1']) -> name('test');


Route::group([
    'middleware' => 'auth:api'
  ], function() {
    Route::resources(['test'=> 'TestController', "branch" => 'BranchController', "workers" => "WorkersController" ,"project" => 'ProjectController']);
  });
  
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
