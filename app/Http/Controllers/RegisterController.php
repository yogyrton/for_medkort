<?php

namespace App\Http\Controllers;

use App\Events\NewUser;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('register.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::query()
            ->create([
                'name' => $data['name'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
            ]);

        Auth::login($user);

        NewUser::dispatch($user);

        return redirect()->intended(route('main'));
    }
}
