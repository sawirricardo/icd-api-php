<?php

namespace Sawirricardo\IcdApi\Connectors;

use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;
use Sammyjo20\Saloon\Traits\Plugins\HasFormParams;

class AccessTokenConnector extends SaloonConnector
{
    use AcceptsJson;
    use HasFormParams;

    public function __construct(
        private string $clientId,
        private string $clientSecret
    ) {
    }

    public function defineBaseUrl(): string
    {
        return 'https://icdaccessmanagement.who.int/connect';
    }

    public function defaultData(): array
    {
        return [
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
        ];
    }
}
