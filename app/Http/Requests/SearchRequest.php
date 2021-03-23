<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

/**
 * @property-read string $search
 */
class SearchRequest extends FormRequest
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
        return ['search' => 'required|max:30|regex: ~^[^/\\\]+$~',];
    }

    protected function failedValidation(Validator $validator)
    {
        $errorStr = implode(' ', $validator->errors()->messages()['search']);
        Session::flash('info', $errorStr);
    }

    public function isInvalid(): bool
    {
        return $this->validator->fails();
    }
}
