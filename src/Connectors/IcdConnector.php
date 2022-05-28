<?php

namespace Sawirricardo\IcdApi\Connectors;

use Sammyjo20\Saloon\Http\Auth\TokenAuthenticator;
use Sammyjo20\Saloon\Http\SaloonConnector;
use Sammyjo20\Saloon\Interfaces\AuthenticatorInterface;
use Sammyjo20\Saloon\Traits\Auth\RequiresTokenAuth;
use Sammyjo20\Saloon\Traits\Plugins\AcceptsJson;
use Sawirricardo\IcdApi\RequestCollections\EntityRequestCollection;

/**
 * @method EntityRequestCollection entities()
 */
class IcdConnector extends SaloonConnector
{
    use AcceptsJson;
    use RequiresTokenAuth;

    protected array $requests = [
        'entities' => EntityRequestCollection::class,
    ];

    public function __construct(private string $accessToken)
    {
    }

    public function defaultHeaders(): array
    {
        return [
            'Authorization' => "Bearer {$this->accessToken}",
        ];
    }

    public function defineBaseUrl(): string
    {
        return 'https://id.who.int/icd';
    }

    public function defaultAuth(): ?AuthenticatorInterface
    {
        return new TokenAuthenticator($this->accessToken);
    }
}
