<?php

namespace Sawirricardo\IcdApi\Data;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Sammyjo20\Saloon\Http\SaloonResponse;

class AccessTokenData implements Arrayable, Jsonable
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

    public function toArray()
    {
        return [
            'access_token' => $this->accessToken,
            'token_type' => $this->tokenType,
            'expires_in' => $this->expiresIn,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
