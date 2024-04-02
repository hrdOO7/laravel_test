<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Post_Controller;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


  Route::get('/post',[Post_Controller::class,"post"])->middleware(['auth']);
  Route::post('/edit_post',[Post_Controller::class,"edit_post"]);
  Route::post('/delete_post',[Post_Controller::class,"delete_post"]);
  Route::post('/add_post',[Post_Controller::class,"add_post"]);


require __DIR__.'/auth.php';
