<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ProfileRepository;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function index()
    {
        $profile = Auth::user()->profile;

        return response()->jsonSuccess($profile, 'Success');
    }

    public function update(UpdateProfileRequest $request)
    {
        $validated = $request->validated();
        $id = auth()->user()->profile->id;

        $this->profileRepository->updateProfile($validated, $id);

        return response()->jsonSuccess([], 'Berhasil update Profile');
    }
}
