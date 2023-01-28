<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user = $this->userRepository->createTokenApi($request);
        if(!$user){
            return response()->jsonError(false, 'Usser tidak ditemukan!');
        }

        $token = $user->createToken('auth_token');

        return response()->jsonSuccess(['token' => $token->plainTextToken], 'Success');
    }

    public function revokeToken()
    {
        auth()->user()->tokens()->delete();

        return response()->jsonSuccess([], 'revoke token berhasil.');
    }
}
