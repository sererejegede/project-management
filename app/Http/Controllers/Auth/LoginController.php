<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/companies';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Api Login
     */
    public function apiLogin(Request $request)
    {
       $this->validate($request, [
          'email' => 'email|required',
          'password' => 'required'
       ]);
       $credentials = $request->only('email', 'password');
       try {
          if (!$token = JWTAuth::attempt($credentials)) {
             return response()->json([
                'message' => 'Invalid credentials',
                'code' => 401
             ], 401);
          }
       } catch (JWTException $exception) {
          return response()->json(['message' => 'Error validating token'], 500);
       }
       $user = JWTAuth::toUser($token);
       return response()->json(['token' => $token, 'user' => $user]);
    }

    public function apiLogout ()
    {
       $token = JWTAuth::getToken()->get();
//
       if (JWTAuth::invalidate($token)) {

          return response()->json([
             'message' => 'Thank you for using our application',
          ]);
       }

       return response()->json([
          'error' => 'Unable to log user out',
          'code' => 401,
       ], 401);
    }
}
