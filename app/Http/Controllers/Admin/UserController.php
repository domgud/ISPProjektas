<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegisterMail;
use App\Models\Address;
use App\Models\Admin;
use App\Models\State;
use App\Models\Trainer;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class UserController extends Controller
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
    public function search(Request $request){

        $uzklausa = '%'.$request->ieskoti.'%';
        $users = User::where('name', 'like', $uzklausa)->get();
        $paieska = $request->ieskoti;
        return view('admin.users.index', compact('users', 'paieska'));
    }
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(User::class, 'user');
    }
    public function create()
    {
        $states = State::all();
        return view('admin.users.create')->with('states', $states);
    }
    public function store(Request $request)
    {
        $request->validate([

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
            'state' => ['required'],
        ]);
        $pass = $this->generateRandomString();
        $trainerRole = Role::where('name', 'trainer')->first()->id;
        $adminRole = Role::where('name', 'admin')->first()->id;
        $a = Address::create([
            'street' => $request->street,
            'city' => $request->city,
            'number' => $request->number,
            'post_code' => $request->post_code,

        ]);
        $user = User::create([
            'role_id' => $trainerRole,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($pass),
            'lastname' => $request->lastname,
            'phonenumber' => $request->phonenumber,
            'code' => $request->code,
            'birthdate' => $request->birthdate,
            'address_id' => $a->id
        ]);
        if($request->role==='trainer')
        {
            Trainer::create([
                'user_id' => $user->id,
                'work_start' =>$request->work_start,
                'end_work' => $request->end_work,
                'state_id' => $request->state,
                'experience' => $request->experience
            ]);
        }
        else{
            $user->role_id=$adminRole;
            $user->save();
            Admin::create([
                'user_id' => $user->id,
                'work_start' =>$request->work_start,
                'end_work' => $request->end_work,
                'state_id' => $request->state
            ]);
        }
        Mail::to($user)->send(new RegisterMail($pass));
        return redirect()->route('admin.users.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }
    public function edit(User $user)
    {
        $states = State::all();
        if($user->hasRole('admin'))
        {
            return view('admin.admins.edit')->with([
                'user' => $user,
                'states' => $states
            ]);
        }
        else if ($user->hasRole('trainer'))
        {
            $states = State::all();
            return view('admin.trainers.edit')->with([
                'user' => $user,
                'states' => $states
            ]);
        }
        else if ($user->hasRole('user'))
        {
            return view('admin.clients.edit')->with('user',$user);
        }

    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
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

        if($user->hasRole('admin')){
            $admin = $user->admin;
            $admin->work_start=$request->work_start;
            $admin->end_work=$request->end_work;
            $admin->state_id=$request->state;
            $admin->save();
        }
        if($user->hasRole('trainer')){
            $trainer = $user->trainer;
            $trainer->work_start=$request->work_start;
            $trainer->end_work=$request->end_work;
            $trainer->state_id=$request->state;
            $trainer->experience=$request->experience;
            $trainer->save();
        }


        return redirect()->route('admin.users.index');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
