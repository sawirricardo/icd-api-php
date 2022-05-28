<?php

namespace Sawirricardo\IcdApi\Data;

use Sammyjo20\Saloon\Http\SaloonResponse;

class EntityCollectionData
{
    public function __construct(
        public ?string $releaseId = null,
        public array $availableLanguages,
        public ?string $releaseDate = null,
        public array $child,
        public string $browserUrl
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['releaseId'],
            $data['availableLanguages'],
            $data['releaseDate'],
            $data['child'],
            $data['browserUrl']
        );
    }

    public static function fromSaloon(SaloonResponse $response): static
    {
        return static::fromArray($response->json());
    }
}
