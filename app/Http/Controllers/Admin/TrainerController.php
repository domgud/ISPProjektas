<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Role;
use App\Models\State;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TrainerController extends Controller
{




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'email' => [
                'required',
                Rule::unique('users')->ignore($trainer->user->id),
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
            'experience' => ['required'],

        ]);
        $user = $trainer->user;
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

        $trainer->work_start=$request->work_start;
        $trainer->end_work=$request->end_work;
        $trainer->state_id=$request->state;
        $trainer->experience=$request->experience;
        $trainer->save();

        return redirect()->route('admin.users.index');
    }


}
