<?php

namespace Sawirricardo\IcdApi\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Sawirricardo\IcdApi\Connectors\IcdConnector;
use Sawirricardo\IcdApi\Data\EntityData;

class ViewEntityRequest extends SaloonRequest
{
    use CastsToDto;

    protected ?string $connector = IcdConnector::class;

    protected ?string $method = Saloon::GET;

    public function __construct(private string $entityId)
    {
    }

    public function defaultHeaders(): array
    {
        return [
            'API-Version' => 'v2',
            'Accept-Language' => 'en',
        ];
    }

    public function defineEndpoint(): string
    {
        return "/entity/{$this->entityId}";
    }

    protected function castToDto(SaloonResponse $response): mixed
    {
        return EntityData::fromSaloon($response);
    }
}
