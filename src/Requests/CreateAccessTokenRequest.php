<?php

namespace Sawirricardo\IcdApi\Requests;

use Sammyjo20\Saloon\Constants\Saloon;
use Sammyjo20\Saloon\Http\SaloonRequest;
use Sammyjo20\Saloon\Http\SaloonResponse;
use Sammyjo20\Saloon\Traits\Plugins\CastsToDto;
use Sammyjo20\Saloon\Traits\Plugins\HasFormParams;
use Sawirricardo\IcdApi\Connectors\AccessTokenConnector;
use Sawirricardo\IcdApi\Data\AccessTokenData;

class CreateAccessTokenRequest extends SaloonRequest
{
    use HasFormParams;
    use CastsToDto;

    protected ?string $connector = AccessTokenConnector::class;

    protected ?string $method = Saloon::POST;

    public function defineEndpoint(): string
    {
        return '/token';
    }

    public function defaultData(): array
    {
        return [
            'scope' => 'icdapi_access',
            'grant_type' => 'client_credentials',
        ];
    }

    protected function castToDto(SaloonResponse $response): AccessTokenData
    {
        return AccessTokenData::fromSaloon($response);
    }
}
