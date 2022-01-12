<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionsRequest extends FormRequest
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
                'title' => 'required|string|between:3,36|unique:permissions',
                'name' => 'required|string|between:3,36|unique:permissions',
                'permission_group_id' => 'required|integer',
            ];
        } else {
            $rules = [
                'title' => 'required|string|between:3,36|unique:permissions,title,' . $this->route('permission'),
                'name' => 'required|string|between:3,36|unique:permissions,name,'.  $this->route('permission'),
                'permission_group_id' => 'required|integer',

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
            'title' => 'Permission title',
            'name' => 'Permission name',
            'group_id' => 'Permission group',

        ];
    }
}
