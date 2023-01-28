<?php

namespace App\Repositories;

use App\Models\Profile;

class ProfileRepository
{
    public function updateProfile($attributes, int $id)
    {
        $nameFile = isset($attributes['picture']) ? $attributes['picture']->getClientOriginalName() : auth()->user()->profile->picture;

        // update profile
        $profile =  Profile::find($id);
        $profile->update([
            'full_name' => $attributes['full_name'],
            'email' => $attributes['email'],
            'phone' => $attributes['phone'],
            'company' => $attributes['company'],
            'devisi' => $attributes['devisi'],
            'picture' => $nameFile,
            'user_id' => auth()->user()->id
        ]);
        if(isset($attributes['picture']) && $attributes['picture']->isValid()){
            $profile->addMediaFromRequest('picture')->toMediaCollection();
        }

        // update user
        $profile->user->update([
            'email' => $attributes['email'],
            'phone' => $attributes['phone'],
            'name' => $attributes['full_name'],
        ]);
    }
}