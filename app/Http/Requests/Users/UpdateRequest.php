<?php

namespace App\Http\Requests\Users;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can(
            'edit', $this->route('user')
        );
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname'    => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'gender_id'   => 'required|numeric',
            'dob'         => 'nullable|date|date_format:Y-m-d',
            'dod'         => 'nullable|date|date_format:Y-m-d',
            'yod'         => 'nullable|date_format:Y',
            'phone'       => 'nullable|string|max:255',
            'address'     => 'nullable|string|max:255',
            'city'        => 'nullable|string|max:255',
            'email'       => 'nullable|string|max:255',
            'password'    => 'nullable|min:6|max:15',
            'birth_order' => 'nullable|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'password.current_password'  => trans('passwords.old_password'),
            'new_password.same_password' => trans('passwords.same_password'),
        ];
    }

    public function validated(User $user = null)
    {
        $formData = parent::validated();

        if ($formData['dod']) {
            $yod = substr($formData['dod'], 0, 4);
        } else {
            $yod = $formData['yod'];
        }

        if(!empty($formData['yod'])) {
            $formData['yod'] = $yod.'-01-01';
        } else {
            $formData['yod'] = $yod;
        }

        if (!empty($formData['password'])) {
            $formData['password'] = bcrypt($formData['password']);
        } else {
            $formData['password'] = $user->getAuthPassword();
        }

        return $formData;
    }
}
