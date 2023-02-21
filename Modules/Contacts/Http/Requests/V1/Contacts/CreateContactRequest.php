<?php

namespace App\Http\Requests\V1\Contacts;

use Illuminate\Foundation\Http\FormRequest;;

class CreateContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required'
        ];
    }
}
