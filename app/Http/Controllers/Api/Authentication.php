<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Authentication extends Controller
{
  /**
   * login
   *
   * @param Request $request
   *
   * @return JsonResponse
   */
  public function login(Request $request): JsonResponse
  {
    $validated = $request->validate([
      'email' => 'required|email:rfc,dns',
      'password' => 'required|min:1'
    ]);

    if (!Auth::attempt($validated)) {
      return response()->json(['message' => 'Wrong Credentials', 'data' => null], 401);
    }

    $accessToken = Auth::user()->createToken('access_token');

    return response()->json(['message' => 'User Login Successful', 'data' => Auth::user(), 'access_token' => $accessToken], 200);
  }

  /**
   * register - new user signup
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function register(Request $request): JsonResponse
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|lowercase|email:rfc,dns|max:255|unique:' . User::class,
      'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
      'role' => UserRole::User,
    ]);

    event(new Registered($user));

    Auth::login($user);

    $accessToken = Auth::user()->createToken('access_token');

    return response()->json(['message' => 'User Signup Successful', 'data' => Auth::user(), 'access_token' => $accessToken], 200);
  }
}
