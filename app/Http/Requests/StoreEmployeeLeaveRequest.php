<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeLeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee_id' => 'exists:employees,id|nullable',
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
            'message' => 'nullable',
            'leave_type' => 'required|string|in:PTO,Sick,Maternity,Paternity,Marriage,Death,Urgent-Work,Other',
            'comment' => 'nullable',
            'checked_by' => 'nullable|exists:employees,id'
        ];
    }
}
