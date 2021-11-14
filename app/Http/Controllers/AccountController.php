<?php

namespace App\Http\Controllers;

use App\Helper\StringHelper;
use App\Http\Controllers\Auth\AuthController;
use App\Models\Account;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends BaseController
{
    public function register(Request $request)
    {
        $validation = Account::getValidation('register');

        $validator = Validator::make($request->all(), $validation[0], $validation[1]);
        if ($validator->errors()->any()) {
            return redirect('/')->withErrors($validator, 'register')->withInput()->with(['tab-login' => '', 'tab-reg' => 'active']);
        }

        $acc = new Account();
        $acc->email = $request->email;
        $acc->password = Hash::make($request->password);
        $acc->name = $request->name;
        $acc->store_name = $request->store;
        $acc->role = 2;
        $acc->save();
        $credentials = $request->only('email', 'password');
        if (AuthController::AuthorizeSuccess($credentials)) {
            return redirect('/dashboard');
        };
        return redirect()->to('/');
    }
}
