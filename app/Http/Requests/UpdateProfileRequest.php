<?php

namespace App\Http\Requests;

use App\Models\Profile;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('profiles')->ignore($this->email, 'email')],
            'phone' => ['required', 'numeric'],
            'company' => ['required'],
            'devisi' => ['required'],
            'picture' => [Rule::requiredIf(function() {
                if(!empty(Profile::find($this->user()->profile->id)->picture)){
                    return false;
                }
                return true;
            }), 'image', 'mimes:jpg,png']
        ];
    }
}
