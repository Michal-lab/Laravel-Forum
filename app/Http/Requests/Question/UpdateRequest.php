<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:10', 'max:50'],
            'tags' => ['required', 'min:3', 'max:40'],
            'description' => ['required', 'min:10', 'max:128'],
            'question' => ['required', 'min:128'],
        ];
    }
}
