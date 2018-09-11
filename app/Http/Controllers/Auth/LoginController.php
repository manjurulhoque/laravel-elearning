<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\AuthFailedException;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        session()->flash('success', 'Successfully loggedin');
        if (request()->ajax()) {
            return response()->json([
                'status' => 'ok'
            ]);
        }

        return redirect('/');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw new AuthFailedException();
    }
}
