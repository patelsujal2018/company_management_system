<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $employeeId = $this->request->get('employee_id');

        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'company_name' => 'numeric',
            'email' => 'email|unique:employees,id,'.$employeeId,
            'phone' => 'numeric|min:10',
        ];
    }
}
