<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Division;
use App\Disrict;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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
    /*This showRegistrationForm() method override form base class*/
    public function showRegistrationForm()
    {
        $districts = Disrict::orderBy('name','asc')->get();
        $divisions = Division::orderBy('priority','asc')->get();
        return view('auth.register',compact('districts','divisions'));
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
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['nullable', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no'  => ['required', 'max:15'],
            'division_id'  => ['required'],
            'district_id'  => ['required'],
            'street_address'  => ['required', 'max:100'],
            'shipping_address'  => ['nullable','string', 'max:100'],


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
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['first_name'],
            'username'     => Str::slug($data['first_name'].$data['first_name']),
            'phone_no' => $data['phone_no'], 
            'email' => $data['email'],
            'status' => '1',
            'password' => Hash::make($data['password']),
            'street_address' => $data['street_address'],
            'division_id' => $data['division_id'],
            'district_id' => $data['district_id'],
            'ip_address'   => request()->ip(),
            'shipping_address' => $data['shipping_address'],
        ]);
    }
}
