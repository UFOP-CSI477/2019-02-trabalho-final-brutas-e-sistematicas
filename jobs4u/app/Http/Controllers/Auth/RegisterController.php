<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

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
            'cpf' => ['required', 'size:11', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'description' => ['max:800', 'string'],
            'street' => ['required', 'max:45', 'string'],
            'number' => ['required', 'max:4', 'integer'],
            'postal_code' => ['required', 'size:8', 'string'],
            'complment' => ['string', 'max:16'],
            'city' => ['string', 'required', 'max:40'],
            'state' => ['required']
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
        $user = [
            // Usuário
            'cpf' => $data['cpf'],
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // Endereço 
            'street' => $data['street'],
            'number' => $data['number'],
            'postal_code' => $data['postal_code'],
            'complment' => $data['complment'],
            'city' => $data['city'],
            'state' => $data['state'],
        ];
        if(isset($data['description'])){
            $user['description'] = $data['description'];
        }
        return User::create($user);
    }
}
