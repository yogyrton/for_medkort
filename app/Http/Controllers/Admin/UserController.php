<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class   UserController extends Controller
{
    public function index()
    {
        $users = User::query()->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();

        User::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'is_admin' => $data['is_admin'],
        ]);

        return redirect()->route('users.index')->with('success', 'Сотрудник добавлена');
    }


    public function edit(string $id)
    {
        $user = User::query()->find($id);

        return view('admin.users.edit', compact('user', 'id'));
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::query()->find($id);
        $data = $request->validated();

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => \Hash::make($data['password']),
            'is_admin' => $data['is_admin'],
        ]);

        return redirect()->route('users.index')->with('success', 'Сотрудник изменен');
    }

    public function destroy(string $id)
    {
        $user = User::query()->find($id);

        if ($user->id == 1) {
            return redirect()->route('users.index')->with('error', 'Сотрудник не может быть удален');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Сотрудник удален');
    }
}
