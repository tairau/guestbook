<?php

declare(strict_types = 1);

namespace App\API\Docs\Responses;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Schema;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Response;
use Vyuldashev\LaravelOpenApi\Factories\ResponseFactory;
use GoldSpecDigital\ObjectOrientedOAS\Objects\MediaType;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

abstract class BaseResponseFactory extends ResponseFactory
{
    public function build(): Response
    {
        return Response::create(class_basename(static::class))
            ->description($this->description())
            ->statusCode($this->statusCode())
            ->content(
                MediaType::json()->schema(Schema::object()->properties(
                    ...$this->properties()
                ))
            );
    }

    protected function description(): string
    {
        return 'ok';
    }

    protected function statusCode(): int
    {
        return HttpResponse::HTTP_OK;
    }

    abstract protected function properties(): array;
}
