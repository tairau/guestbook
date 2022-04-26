<?php

declare(strict_types = 1);

namespace Framework\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function rules(): array
    {
        return [];
    }
}
