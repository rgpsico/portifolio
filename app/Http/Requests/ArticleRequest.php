<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $id = $this->segment(3);
        $title = $this->title;

        $rules = [
            'title' => "required|string|max:100|unique:articles,title,{$title}",
            'body' => 'string',
            'categoria' => 'string|max:100'
        ];
        
        if ($this->method() == 'PUT') {
            $rules = [
                'title' => [
                    'required',
                        Rule::unique('articles', 'title')->ignore($id),
                ]
            ];
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'title.unique' => 'Este titulo já existe',
            'body.required' => 'O conteudo é obrigátorio.',
        ];
    }
}
