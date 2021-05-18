<?php

namespace App\Http\Requests;

use App\Models\Article;
use App\Rules\InputStringSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $title
 * @property string $brief
 * @property ?string $article
 * @property string $status
 * @property string $keywords
 * @property int[] $tags
 */
class AddArticleRequest extends FormRequest
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
        return [
            'title' => ['required', new InputStringSize(255)],
            'brief' => 'required',
            'keywords' => 'required',
            'tags' => ['required', 'array', 'min:1'],
            'tags.*' => ['exists:tags,id'],
            'status' => ['required', Rule::in(Article::STATUSES)],
        ];
    }
}
