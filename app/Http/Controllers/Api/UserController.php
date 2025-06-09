<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
  /**
   * get - get user details
   */
  public function get(Request $request): JsonResponse
  {
    return response()->json([]);
  }
}
