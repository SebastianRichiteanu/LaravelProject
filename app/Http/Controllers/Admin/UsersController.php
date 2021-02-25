<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Gate;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(middleware:'auth');
    }
    public function index()
    {
        if (Gate::denies('users-panel')) {
            return redirect(route('products.index'));
        }
        $users = User::all();
        return view('/admin/users/index', compact('users'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('users-panel')) {
            return redirect(route('products.index'));
        }
        $roles = Role::all();
        return view('/admin/users/edit',[
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Gate::denies('users-panel')) {
            return redirect(route('products.index'));
        }
        $user->roles()->sync($request->roles);
        return redirect(route('users.index'));
    }

   
    public function destroy(User $user)
    {
        if (Gate::denies('users-panel')) {
            return redirect(route('products.index'));
        }
        $user->roles()->detach();
        $user->delete();
        return redirect(route('users.index'));
    }


}
