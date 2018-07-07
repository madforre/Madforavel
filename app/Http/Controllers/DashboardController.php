<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // 유저 모델을 사용하기 위해 필요하다.

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with('posts', $user->posts); // 모델에서 관계를 추가해주면 $user->posts 처럼 써줄 수 있다.
    }
}
