<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends FormRequest
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
        if ($this->getMethod() == 'POST') {
            $rules = [
                'title' => 'required|string|between:3,36|unique:roles',
                'name' => 'required|string|between:3,36|unique:roles',
                'permissions' => 'required_without_all',
            ];
        } else {
            $rules = [
                'title' => 'required|string|between:3,36|unique:roles,title,' . $this->route('role'),
                'name' => 'required|string|between:3,36|unique:roles,name,'.  $this->route('role'),
                'permissions' => 'required_without_all',

            ];
        }
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Role title',
            'name' => 'Role name',
            'permissions' => 'Role permissions',

        ];
    }
}
