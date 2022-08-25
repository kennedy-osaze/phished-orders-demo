<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'min:3', 'max:255'],
            'body' => ['required', 'string', 'min:3', 'max:65536'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            'name' => ucfirst($this->name),
            'email' => ucfirst($this->email),
            'subject' => ucfirst($this->subject),
            'body' => ucfirst($this->body),
        ];
    }
}
