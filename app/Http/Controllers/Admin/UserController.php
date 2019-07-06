<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index')
            ->with('users', User::all())
            ->with('tableUpdate', User::orderBy('updated_at', 'desc')->first()->updated_at);
    }

    public function create()
    {
        return view('admin.users.create')
            ->with('userRoles', UserRole::orderBy('type_of_user')->get());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'user_role_id' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'user_type' => 'required',
            'status' => 'required',
            'verify' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('admin.users.index');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit')
            ->with('user', $user)
            ->with('userRoles', UserRole::orderBy('type_of_user')->get());
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'user_role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'user_type' => 'required',
            'status' => 'required',
            'verify' => 'required',
        ]);

        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function adminOrNot(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();
        return back();
    }

    public function status(User $user)
    {
        $user->status = !$user->status;
        $user->save();
        return back();
    }

    public function verified(User $user)
    {
        $user->is_verified = !$user->is_verified;
        $user->save();
        return back();
    }
}
