<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function search(Request $request){

        $uzklausa = '%'.$request->ieskoti.'%';
        $users = User::where('name', 'like', $uzklausa)->get();
        $paieska = $request->ieskoti;
        return view('admin.users.index', compact('users', 'paieska'));
    }
    public function _construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        $states = State::all();
        return view('admin.users.create')->with('states', $states);
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
