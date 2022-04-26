<?php

declare(strict_types = 1);

namespace App\API\Messages;

use Framework\Http\Requests\Request;
use App\Services\Messages\MessageDto;

class MessageRequest extends Request
{
    public function rules(): array
    {
        return [
            'text'      => [
                'required',
                'max:5000',
            ],
        ];
    }

    public function message(): MessageDto
    {
        return (new MessageDto(user()))
            ->type($this->input('text'));
    }
}
