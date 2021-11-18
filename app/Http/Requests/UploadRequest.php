<?php

namespace App\Http\Requests;

use App\Rules\cepValidation;
use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
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
            'cep' => ['regex:/^[0-9]{5}[0-9]{3}$/',new cepValidation],            
        ];
    }

    public function all($keys = null) 
    {   
        $data = parent::all($keys);
        $data['cep'] = $this->route('cep');
        return $data;
    }

    public function messages()
    {
        return ['cep.regex' => 'cep invalido'
              
    ];
    }

    
}
