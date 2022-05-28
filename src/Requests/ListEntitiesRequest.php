<?php

namespace Sawirricardo\IcdApi\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Sawirricardo\IcdApi\Connectors\IcdConnector;
use Sawirricardo\IcdApi\Data\EntityCollectionData;

class ListEntitiesRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = IcdConnector::class;

    protected ?string $method = Saloon::GET;

    public function __construct(private ?string $releaseId = null)
    {
    }

    public function defaultHeaders(): array
    {
        return [
            'API-Version' => 'v2',
            'Accept-Language' => 'en',
        ];
    }

    public function defaultQuery(): array
    {
        if (is_null($this->releaseId)) {
            return [];
        }

        return [
            'releaseId' => $this->releaseId,
        ];
    }

    public function defineEndpoint(): string
    {
        return '/entity';
    }

    protected function castToDto(SaloonResponse $response): EntityCollectionData
    {
        return EntityCollectionData::fromSaloon($response);
    }
}
