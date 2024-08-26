<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\User;

class ResetPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $userId = session('user');
        $user = User::find($userId);
        return $user->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'userId' => 'required',
        ];
    }
}
