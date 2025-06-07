<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
  return $request->user();
})->middleware('auth:sanctum');

Route::controller(TaskController::class)->group(function () {
  Route::get('/tasks/{id}', 'get');
  Route::patch('/tasks/{id}', 'update');
  Route::delete('/tasks/{id}', 'delete');
  Route::post('/tasks', 'all');
});
