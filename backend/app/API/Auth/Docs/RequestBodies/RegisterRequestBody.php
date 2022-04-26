<?php

declare(strict_types = 1);

namespace App\API\Auth\Docs\RequestBodies;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class RegisterRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create('Register')
            ->content(
                MediaType::json()->schema(
                    Schema::object()->properties(
                        Schema::string('email')
                            ->example('example@example.com'),
                        Schema::string('password')
                            ->example('password'),
                    ),
                )
            );
    }
}
