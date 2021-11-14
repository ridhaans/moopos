<?php

namespace App\Models;

use App\Helper\StringHelper;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Account extends Authenticatable
{
    // use Notifiable;

    protected $table = 'account';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getValidation($validationType)
    {
        $validation=[];
        if($validationType=='login'){
            $validation[]=[
                'login_email' => 'required|email',
                'login_password' => 'required',
            ];
            $validation[]= [
                'login_email.required' => StringHelper::ErrorMessageHelper('email', 'required'),
                'login_email.email' => StringHelper::ErrorMessageHelper('email', 'email'),
                'login_password.required' => StringHelper::ErrorMessageHelper('password', 'required'),
            ];

            return $validation;
        }
        else{
            $validation[]=[
                'name' => 'required|min:3|max:50',
                'store'=>'required|max:200|min:3',
                'email' => 'required|email|unique:account,email',
                'password' => 'required|min:6',
            ];
            $validation[]= [
                'name.required' => StringHelper::ErrorMessageHelper('nama', 'required'),
                'name.min'=> StringHelper::ErrorMessageHelper('nama','min:3'),
                'name.max'=> StringHelper::ErrorMessageHelper('nama','max:50'),
    
                'store.required'=>StringHelper::ErrorMessageHelper('nama toko', 'required'),
                'store.min'=> StringHelper::ErrorMessageHelper('nama','min:3'),
                'store.max'=> StringHelper::ErrorMessageHelper('nama','max:200'),
    
                'email.required' => StringHelper::ErrorMessageHelper('email', 'required'),
                'email.email' => StringHelper::ErrorMessageHelper('email', 'email'),
                'email.unique' => StringHelper::ErrorMessageHelper('email', 'unique:account,email'),
    
                'password.required' => StringHelper::ErrorMessageHelper('password', 'required'),
                'password.min'=> StringHelper::ErrorMessageHelper('name','min:6')
            ];
            return $validation;
        }
    }
}
