<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit')->with( 'client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'email' => [
                'required',
                Rule::unique('users')->ignore($client->user->id),
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
        ]);
        $user = $client->user;
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


        return redirect()->route('admin.users.index');
    }

}
