<?php

namespace app\Http\Requests;

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
        return [
            'name' => 'required|max:255',
            'ministry' => 'max:255',
            'phone1' => 'max:15',
            'phone2' => 'max:15',
            'phone3' => 'max:15',
            'cnpj' => 'max:14|cnpj',
            'email' => 'max:255|email',
            'website' => 'website',
            'comments' => 'max:65535',
            'online' => 'boolean',
        ];
    }
}
