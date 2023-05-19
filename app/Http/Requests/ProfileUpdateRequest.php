<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'profiles' => [File::image()->max(1024 * 5)], // maximum file is 5 mb
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)]
        ];
    }
}
