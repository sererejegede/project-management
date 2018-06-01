<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
       if (auth()->attempt([
          'email' => $request->input('email'),
          'password' => $request->input('password')
       ]))
       {
          $user = auth()->user();
          $user->api_token = str_random(60);
          $user->save();
          return $user;
       }
       return response()->json([
          'error' => 'Unauthorized',
          'code' => 401
       ], 401);
    }

    public function apiLogout ()
    {
       if (auth()->user()) {
          $user = auth()->user();
          $user->api_token = null; // clear api token
          $user->save();

          return response()->json([
             'message' => 'Thank you for using our application',
          ]);
       }

       return response()->json([
          'error' => 'Unable to logout user',
          'code' => 401,
       ], 401);
    }
}
