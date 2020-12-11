<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Admin;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{


    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('admin.admins.create')->with('states', $states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request ->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'lastname' => ['required'],
            'birthdate' => ['required'],
            'code' => ['required'],
            'phonenumber' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'number' => ['required'],
            'post_code' => ['required'],
            'work_start' => ['required'],
            'end_work' => ['required'],
            'state' => ['required'],
            ]);
        $pass = $this->generateRandomString();
        $a = Address::create([
            'street' => $request->street,
            'city' => $request->city,
            'number' => $request->number,
            'post_code' => $request->post_code,

        ]);
        $adminRole = Role::where('name', 'admin')->first()->id;
        $user = User::create([
            'role_id' => $adminRole,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($pass),
            'lastname' => $request->lastname,
            'phonenumber' => $request->phonenumber,
            'code' => $request->code,
            'birthdate' => $request->birthdate,
            'address_id' => $a->id

        ]);
        Admin::create([
            'user_id' => $user->id,
            'work_start' =>$request->work_start,
            'end_work' => $request->end_work,
            'state_id' => $request->state
        ]);
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $states = State::all();
        return view('admin.admins.edit')->with([
            'admin' => $admin,
            'states' => $states
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'email' => [
                'required',
                Rule::unique('users')->ignore($admin->user->id),
            ],
            'name' => ['required'],
            'lastname' => ['required'],
            'birthdate' => ['required'],
            'code' => ['required'],
            'phonenumber' => ['required'],
            'city' => ['required'],
            'street' => ['required'],
            'number' => ['required'],
            'post_code' => ['required'],
            'work_start' => ['required'],
            'end_work' => ['required'],
            'state' => ['required'],
        ]);
        $user = $admin->user;
        $address = $user->address;

        $address->city = $request->city;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->post_code = $request->post_code;
        $address->save();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->lastname = $request->lastname;
        $user->phonenumber = $request->phonenumber;
        $user->code = $request->code;
        $user->birthdate = $request->birthdate;
        $user->save();

        $admin->work_start=$request->work_start;
        $admin->end_work=$request->end_work;
        $admin->state_id=$request->state;
        $admin->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
