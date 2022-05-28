<?php

namespace Sawirricardo\IcdApi\Data;

use Sammyjo20\Saloon\Http\SaloonResponse;

class EntityData
{
    public function __construct(
        public ?array $parent = null,
        public ?array $child = null,
        public ?array $title = null,
        public ?array $synonym = null,
        public ?array $definition = null,
        public ?array $exclusion = null,
        public ?array $relatedEntitiesInPerinatalChapter = null,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            $data['parent'],
            $data['child'],
            $data['title'],
            $data['synonym'],
            $data['definition'],
            $data['exclusion'],
            $data['relatedEntitiesInPerinatalChapter'],
        );
    }

    public static function fromSaloon(SaloonResponse $response): static
    {
        return static::fromArray($response->json());
    }
}
