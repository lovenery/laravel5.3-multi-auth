<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dash';
    protected $username;

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
        $this->username = config('admin.global.username');
    }

    // 重寫view
    public function showLoginForm()
    {
        return view('admin.login.index');
    }

    // 自定義驅動
    protected function guard()
    {
        return auth()->guard('admin');
    }
}
