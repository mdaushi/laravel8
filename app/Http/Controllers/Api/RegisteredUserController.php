<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\Http\Requests\Auth\ResgisterRequest;

class RegisteredUserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function store(ResgisterRequest $request)
    {
        $validated = $request->validated();

        $user =  $this->userRepository->registerUser($validated);

        return response()->jsonSuccess($user, 'Registrasi Berhasil.');
    }
}
