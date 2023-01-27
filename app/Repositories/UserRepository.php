<?php

namespace App\Repositories;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function registerUser($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Profile::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => $user->id
        ]);

        return $user;
    }
}