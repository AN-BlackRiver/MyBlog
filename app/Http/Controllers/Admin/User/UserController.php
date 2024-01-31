<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', ['users' => User::paginate(5)]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::query()->firstOrCreate([$data['email']],$data);
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('admin.users.show', ['user'=>$user]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', ['user'=>$user, 'roles' => User::getRoles()]);
    }

    public function create()
    {
        return view('admin.users.create', ['roles' => User::getRoles()]);
    }

    public function update(User $user, UpdateRequest $request)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
