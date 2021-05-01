<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

/**
 * @property ?string $tag
 * @property ?string $status
 */
class ArticlesFilterRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'tag' => ['nullable', 'string', 'max:50'],
        ];
    }

    //вывод ошибок в flash message
    protected function failedValidation(Validator $validator): void
    {
        $errorStr = implode(' ', $validator->errors()->messages()['tag']);
        Session::flash('info', $errorStr);
    }

    public function isInvalid(): bool
    {
        // Laravel doesn't auto validate GET query string. So, here makes explicit validation call.
        $this->validateResolved();

        return $this->validator->fails();
    }
}
