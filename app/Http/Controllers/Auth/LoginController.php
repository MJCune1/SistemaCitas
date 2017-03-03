<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    /*

    public function index(){}
 protected function redirectTo()
    {
$user=Auth::user;
        switch ($user) {
            case 0:
                echo "i es igual a 0";
                break;
            case 1:
                echo "i es igual a 1";
                break;
            case 2:
                echo "i es igual a 2";
                break;
        }
        return '/path';

*/

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {


        $this->middleware('guest', ['except' => 'logout']);
    }
}
