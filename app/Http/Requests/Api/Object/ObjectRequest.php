<?php

namespace App\Http\Requests\Api\Object;

use Illuminate\Foundation\Http\FormRequest;

class ObjectRequest extends FormRequest
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

        $services = [
            'services.basic.*.*' => 'numeric',
            'services.additional.*' => 'numeric',
            'services.custom.*.name' => 'required|string',
            'services.custom.*.1'   => 'numeric',
            'services.custom.*.2'   => 'numeric',
            'services.custom.*.3'   => 'numeric',
            'services.custom.*.4'   => 'numeric',
        ];

        $rules = [
            'name' => 'required|string|max:60',
            'type' => 'required',
            'email' => 'nullable|email',
//            'phone' => 'regex:',
            'location' => 'nullable|json',
            'city' => 'nullable|string',
            'address' => 'nullable|string',
            'image' => 'nullable|image',
            'posts' => 'nullable|integer',
            'schedule.*.*' => 'required',
//            'requisites' => 'required'
        ];

        return array_merge($rules, $services);
    }
}
