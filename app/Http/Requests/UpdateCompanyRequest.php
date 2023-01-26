<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
        $companyId = $this->request->get('company_id');

        return [
            'name' => 'required|string|max:100',
            'email' => 'email|unique:companies,id,'.$companyId,
            'logo' => 'image',
            'website' => 'string|max:100'
        ];
    }
}
