<?php

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

use App\Http\Controllers\TasksController;

/*Route::get('/', function () {
    return view('tasks.index'); //welcome
});*/

Route::get('/', [TasksController::class, 'index']);

Route::get('/tasks', [TasksController::class, 'index']);

Route::get('/tasks/create', [TasksController::class, 'create']);

Route::get('/tasks/{id}/edit', [TasksController::class, 'edit']);

Route::post('/tasks', [TasksController::class, 'store']);

Route::put('/tasks/{id}/update', [TasksController::class, 'update']);

Route::patch('/tasks/{id}', [TasksController::class, 'complete']);

Route::delete('/tasks/{id}', [TasksController::class, 'delete']);
