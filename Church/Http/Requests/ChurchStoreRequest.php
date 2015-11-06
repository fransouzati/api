<?php

namespace Church\Http\Requests;

use App\Http\Requests\Request;

class ChurchStoreRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $input = parent::all();

        $rules = [
            'name' => 'required|max:255',
            'ministry' => 'max:255',
            'phone1' => 'max:15',
            'phone2' => 'max:15',
            'phone3' => 'max:15',
            'cnpj' => 'max:14|cnpj',
            'email' => 'max:255|email',
            'comments' => 'max:65535',
            'online' => 'boolean',
            'addresses' => 'required_if:online,false,0|required_without:online|array',
        ];

        /*
         * Verifica se foram passados endereços
         * Caso contrário devolver as regras
         */
        if (!isset($input['addresses']) || !is_array($input['addresses'])) {
            return $rules;
        }

        /*
         * Regras para validação dos addresses(endereços)
         * @var array
         */
        $addressesRules = [
            'zipcode' => 'max:10',
            'street' => 'required|max:255',
            'number' => 'numeric',
            'district' => 'max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'phone1' => 'max:15',
            'phone2' => 'max:15',
            'phone3' => 'max:15',
            'email' => 'email',
            'website' => 'max:255',
            'latitude' => 'numeric',
            'longitude' => 'numeric',
            'comments' => 'max:65535',
        ];

        /*
         * @var array
         */
        $addresses = $input['addresses'];

        /*
         * varre a array de addresses e verifica se todos os campos
         * de "rules" foram informados
         *
         * @var array
         */
        $newRules = [];
        foreach ($addresses as $row => $address) {
            /*
             * varre rules para verificar as keys e
             * o tipo de validação configurada, e adiciona nas novas rules
             * @var array
             */
            foreach ($addressesRules as $key => $value) {
                $newRules['addresses.'.$row.'.'.$key] = $value;
            }
        }

        return array_merge($rules, $newRules);
    }
}
