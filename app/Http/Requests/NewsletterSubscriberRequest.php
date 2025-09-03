<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterSubscriberRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required | email | unique:newsletter_subscribers',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
