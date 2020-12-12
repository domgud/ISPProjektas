<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Models\Address;
use App\Models\Client;
use App\Models\Email_letter;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'lastname' => ['required'],
            'birthdate' => ['required'],
            'code' => ['required'],
            'phonenumber' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'number' => ['required'],
            'post_code' => ['required'],
        ]);
        //TODO add validation for the additional fields
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $a = Address::create([
            'street' => $data['street'],
            'city' => $data['city'],
            'number' => $data['number'],
            'post_code' => $data['post_code'],

        ]);

        $userRole = Role::where('name', 'user')->first()->id;
        $user = User::create([
            'role_id' => $userRole,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address_id' => $a->id,
            'lastname' => $data['lastname'],
            'birthdate' => $data['birthdate'],
            'code' => $data['code'],
            'phonenumber' => $data['phonenumber'],

        ]);
        Client::create([
            'user_id' => $user->id,
            'created_date' => Carbon::now()
        ]);
        //this is like super dumb
        //but im forced to do this :(
        $tekstas = 'Sveiki prisiregistravę prie pačios geriausios svetainės!!!';

        Email_letter::create([
            'sukurimo_data' => \Illuminate\Support\Carbon::now(),
            'tekstas' => $tekstas,
            'adresas' => $user->email
        ]);
        Mail::to($user)->send(new WelcomeMail());
        return $user;
    }
}
