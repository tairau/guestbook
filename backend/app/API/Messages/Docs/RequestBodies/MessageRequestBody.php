<?php

declare(strict_types = 1);

namespace App\API\Messages\Docs\RequestBodies;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use GoldSpecDigital\ObjectOrientedOAS\Objects\RequestBody;
use Vyuldashev\LaravelOpenApi\Factories\RequestBodyFactory;

class MessageRequestBody extends RequestBodyFactory
{
    public function build(): RequestBody
    {
        return RequestBody::create('AddMessage')
            ->content(
                MediaType::json()->schema(
                    Schema::object()->properties(
                        Schema::string('text')
                            ->example('some text'),
                    ),
                )
            );
    }
}
