<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class MailgunWebhookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'signature' => ['required', 'string'],
            'token' => ['required', 'string'],
            'timestamp' => ['required', 'integer'],
            'from' => ['required', 'string'],
            'subject' => ['required', 'string'],
            'recipient' => ['required', 'string'],
            'stripped-text' => ['required', 'string'],
            'Message-Id' => ['required', 'string'],
            'Date' => ['required', 'string', 'date', 'before:now'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $this->validateWebhook();
        });
    }

    private function validateWebhook(): void
    {
        $data = $this->timestamp.$this->token;
        $signature = hash_hmac('sha256', $data, config('services.mailgun.secret'));

        if (! hash_equals($this->signature, $signature)) {
            throw new AuthorizationException('Webhook validation failed.');
        }
    }

    public function validated($key = null, $default = null)
    {
        return [
            'message_id' => $this->str('Message-Id')->between('<', '>')->value(),
            'from' => [
                'name' => $this->str('from')->before(' <')->value(),
                'email' => $this->str('from')->between('<', '>')->value(),
            ],
            'subject' => $this->str('subject')->trim()->value(),
            'body' => $this->str('stripped-text')->value(),
            'date' => $this->date('Date'),
        ];
    }
}
