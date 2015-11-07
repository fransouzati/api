<?php

namespace Domain\Http\Requests;

use App\Http\Requests\Request;

class ContactStoreRequest extends Request
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
            'email' => 'max:255|email',
            'phone' => 'max:15',
            'comments' => 'required|min:2|max:65535',
        ];
    }
}
