<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RolePermissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [];
    }

    public function getValidatorInstance(): Validator
    {
        $validator = parent::getValidatorInstance();
        $validator->after(function () use ($validator) {
            $routeConfigs = config($this->route()?->parameter('type') . 'permissions.configurable_routes');
            $roles = $this->get('roles', []);

            foreach ($roles as $roleKey => $roleValue) {
                foreach ($roleValue as $roleGroupKey => $roleGroupValue) {
                    foreach ($roleGroupValue as $key => $role) {
                        if (!isset($routeConfigs[$roleKey][$roleGroupKey][$role])) {
                            unset($roles[$roleKey][$roleGroupKey][$key]);
                        }
                    }
                    if (empty($roles[$roleKey][$roleGroupKey])) {
                        unset($roles[$roleKey][$roleGroupKey]);
                    }
                }
                if (empty($roles[$roleKey])) {
                    unset($roles[$roleKey]);
                }
            }

            $this->merge(['roles' => $roles]);
        });
        return $validator;
    }
}
