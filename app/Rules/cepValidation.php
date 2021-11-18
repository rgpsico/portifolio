<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class cepValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $cepUri;
    public function __construct()
    {
        $this->cepUri = config('services.correios.viaCep');        
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
     
        $response = Http::get($this->cepUri.$value.'/json');
        $data = json_decode($response->getBody()->getContents());
        
        if(isset($data->cep)) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CEP :attribute invalido.';
    }
}
