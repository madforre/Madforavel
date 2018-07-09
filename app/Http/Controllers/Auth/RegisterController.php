<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request; // 라우터에서 파라미터를 컨트롤러에 전달할 때 사용한다.
use App\Mail\OrderShipped; // 메일 발송을 위해 추가.
use Illuminate\Support\Facades\Mail; // 메일 발송을 위해 추가.
use Illuminate\Auth\Events\Registered; // register 메소드 오버라이딩을 위해 추가.


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        $activation_code = str_random(30).time();
        Mail::to($data['email'])->send(new OrderShipped($activation_code));
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'activation_code' => $activation_code,
        ]);
        
    }

    /**
     * User Email Verification. - by madforre
     *
     * @param  string  $activationCode
     */
    public function verification(string $activation_code)
    {
        try {
            // DB에서 activation_code 검색하여 변수에 담음
            $user = User::where('activation_code', $activation_code)->first();
            if (!$user) {
                return "인증코드가 존재하지 않거나 만료되었습니다.";
            }

            $activated_user = $user->name;
            $user->status          = 1;
            $user->activation_code = null;
            $user->save();

        } catch (\Exception $exception) {
            logger()->error($exception);
            return "User Email Verification has a problem.";
        }
        
        return redirect('/')->with('success', $activated_user.'님의 이메일 인증이 완료되었습니다! 이제 로그인하시면 매드포라벨을 더욱 다양하게 즐기실 수 있습니다.'); // 계정 인증되고 index 으로 리다이렉트, flash창 띄운다.

    }    

    /**
    * Handle a registration request for the application.
    * 회원가입 후 로그아웃 되게끔 메소드 오버라이딩을 해주었다.
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
       $this->validator($request->all())->validate();

       event(new Registered($user = $this->create($request->all())));

       $this->guard()->logout($user);

       return $this->registered($request, $user)
                       ?: redirect($this->redirectPath())->with('success', $user->name.' 님의 회원가입을 환영합니다. 로그인 하시려면 이메일을 통한 인증이 필요합니다!');
    }    

}
