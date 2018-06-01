<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Auth\LoginController@apiLogin');
Route::post('logout', 'Auth\LoginController@apiLogout');
Route::middleware(['auth:api'])->group(function () {
   Route::post('projects/addUser', 'ProjectsController@addUser')->name('projects.addUser');
   Route::resources([
      'companies' => 'CompaniesController',
      'users' => 'UsersController',
      'projects' => 'ProjectsController',
      'tasks' => 'TasksController',
      'comments' => 'CommentsController',
   ]);
});
