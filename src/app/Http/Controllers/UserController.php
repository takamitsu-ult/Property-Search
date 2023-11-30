<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function top()
    {
        return view('user.top');
    }

    // 登録フォームを表示
    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function showConfirmation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        $request->session()->put('registration_data', $request->all());

        return view('user.confirm')->with('userData', $request->all());
    }

    // ユーザーの登録処理
    public function register(Request $request)
    {
        $userData = $request->session()->get('registration_data');

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
        ]);

        Auth::login($user);

        $request->session()->forget('registration_data');

        return redirect()->route('user.top')->with('success', '登録が完了しました');
    }

    // ログインフォームを表示
    public function showLoginForm()
    {
        return view('user.login');
    }


    // ユーザーのログイン処理
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // ログイン
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('user.top')->with('success', 'ログインしました');
        }

        return back()->withErrors(['email' => 'ログインに失敗しました']);

    }


    public function profile()
    {
        // ユーザーのプロフィール編集ページを表示するアクション
        return view('user.profile');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.top')->with('success', 'ログアウトしました');
    }
}
