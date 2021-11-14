<?php

namespace App\Http\Controllers\Auth;

use App\Models\Account;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLogin()
    {
        if (session()->get('tab-reg') == 'active') {
            session()->keep('tab-reg');
            session()->put('tab-login', '');
        } else {
            session()->put('tab-login', 'active');
            session()->put('tab-reg', '');
        }
        return view('account.login');
    }
    public function login(Request $request)
    {
        $credentials['email'] = $request->login_email;
        $credentials['password'] = $request->login_password;
        if (self::AuthorizeSuccess($credentials)) {
            return redirect('/dashboard');
        }
        return redirect('/')->withErrors(['login' => ['Email atau password salah']]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect('/');
    }

    public static function AuthorizeSuccess($credentials = [])
    {

        return Auth::attempt($credentials);
    }

    public static function Debug($data)
    {
        dd(["data" => $data]);
    }
}
