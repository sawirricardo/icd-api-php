<?php

namespace Sawirricardo\IcdApi\Data;

use Sammyjo20\Saloon\Http\SaloonResponse;

class AccessTokenData
{
    public function __construct(
        public string $accessToken,
        public string $tokenType,
        public int $expiresIn,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['access_token'],
            $data['token_type'],
            $data['expires_in'],
        );
    }

    public static function fromSaloon(SaloonResponse $response): static
    {
        return static::fromArray($response->json());
    }
}
