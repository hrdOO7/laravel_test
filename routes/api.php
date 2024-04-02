<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Post_Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



  Route::any('/post',[Post_Controller::class,"post_api"]);
  Route::any('/edit_post',[Post_Controller::class,"edit_post_api"]);
  Route::any('/delete_post',[Post_Controller::class,"delete_post_api"]);
  Route::any('/add_post',[Post_Controller::class,"add_post_api"]);


  Route::any('/add_comment',[Post_Controller::class,"add_comment_api"]);
