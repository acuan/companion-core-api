<?php

namespace App\Domains\Chat\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AskQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'content_id' => ['required','exists:contents,id'],
            'question' => ['required','string','max:1000']
        ];
    }
}