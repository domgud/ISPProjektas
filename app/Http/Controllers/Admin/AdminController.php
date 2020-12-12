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


}
