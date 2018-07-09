<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // 파라미터 전달을 위해 추가

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
    protected $redirectTo = '/dashboard';

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
        if ($user->status == 0) {

            $message = '이메일 인증이 필요한 계정입니다^^;';

            // Log the user out.
            $this->logout($request);

            // Return them in form.            
            // return redirect()->back()->with('error', '이메일에서 계정을 인증하여 활성화 해주세요.');  
            
            // Return them to the log in form.
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    // This is where we are providing the error message.
                    $this->username() => $message,
                ]); 
        }
    }
}
