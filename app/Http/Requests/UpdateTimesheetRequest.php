<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Timesheet;
use App\Models\User;

class UpdateTimesheetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $timesheet = Timesheet::find($this->route('timesheet'));
        
        $userId = session('user');
        $user = User::find($userId);

        return $user->can('update', $timesheet);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'difficulty' => 'string',
            'next_plan' => 'string',
        ];
    }
}
