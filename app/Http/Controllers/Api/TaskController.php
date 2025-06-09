<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  /**
   * create - creates a new task for user
   *
   * @param Request - request
   * @param uid - searches for a user by id and creates a task for the user
   * @return JsonResponse
   */
  public function create(Request $request, string $uid) {}

  public function get(string $id)
  {
    return response()->json(
      [
        'message' => 'Task exist',
        'data' => null,
      ],
      200
    );
  }

  public function all() {}

  public function update(string $id) {}
  public function delete(string $id) {}
}
