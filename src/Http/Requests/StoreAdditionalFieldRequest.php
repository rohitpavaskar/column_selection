<?php

namespace Rohitpavaskar\AdditionalField\Http\Requests;

use Config;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdditionalFieldRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'language' => 'required|in:' . Config::get('app.fallback_locale'),
            'name' => 'required',
            'type' => 'required',
            'parent_id' => 'nullable|exists:additional_fields,id',
            'mandatory' => 'nullable',
            'editable_by_user' => 'nullable',
            'options' => 'required_if:type,dropdown',
            'options.*.name' => 'distinct'
        ];
    }

}
