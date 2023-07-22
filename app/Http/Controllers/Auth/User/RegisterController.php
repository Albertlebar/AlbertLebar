<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

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
    public function showRegistrationForm()
    {
        return view('auth.user.register');
    }

    public function validatorRegister(array $data)
    {
        return Validator::make($data, [
            'f_name' => ['required', 'string', 'max:255'],
            'l_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'company' => ['required', 'string', 'max:255'],
            'address_field_1' => ['required', 'string', 'max:255'],
            'address_field_2' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'state_province_county' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            'vat_number' => ['required', 'string', 'max:255'],
            'refrences' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function createUser(array $data)
    {
        return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'email' => $data['email'],
            'company' => $data['company'],
            'address_field_1' => $data['address_field_1'],
            'address_field_2' => $data['address_field_2'],
            'city' => $data['city'],
            'country' => $data['country'],
            'state_province_county' => $data['state_province_county'],
            'postcode' => $data['postcode'],
            'telephone' => $data['telephone'],
            'mobile' => $data['mobile'],
            'vat_number' => $data['vat_number'],
            'refrences' => $data['refrences'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        $this->validatorRegister($request->all())->validate();
        $user = $this->createUser($request->all());
        echo "Yes";
        die;
        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect($this->redirectPath());
    }
}
