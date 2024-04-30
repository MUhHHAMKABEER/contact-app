<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company' => ['nullable'],
            'bio' => ['nullable'],
            'profile_picture' => ['nullable','mimes:png,jpeg,bmp'],
        ];
    }

    public function handleRequest()
    {
        $profileData = $this->validated();

        $profile = $this->user();

        if ($this->hasFile('profile_picture')) {
            $picture = $this->profile_picture;

            $fileName = "profile-picture-{$profile->id}.".$picture->getClientOriginalExtension();


            // $picture->move(public_path('upload'),$fileName);
            $fileName = $picture->storeAs('uploads',$fileName);


            $profileData['profile_picture'] = $fileName;
        }

        return $profileData;
    }
}
