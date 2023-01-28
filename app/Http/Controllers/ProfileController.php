<?php

namespace App\Http\Controllers;

use App\Models\Profile;
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
        return view('pages.profile.index', compact('profile'));
    }

    public function edit()
    {
        $profile =  Auth::user()->profile;
        return view('pages.profile.edit', compact('profile'));
    }

    public function update(UpdateProfileRequest $request, $id)
    {
        $validated = $request->validated();

        $this->profileRepository->updateProfile($validated, $id);

        return redirect()->route('profile.index')->with('success', 'Berhasil update profile!');
    }
}
