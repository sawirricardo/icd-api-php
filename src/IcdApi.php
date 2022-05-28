<?php

namespace Sawirricardo\IcdApi;

use Sawirricardo\IcdApi\Connectors\AccessTokenConnector;
use Sawirricardo\IcdApi\Connectors\IcdConnector;
use Sawirricardo\IcdApi\Data\AccessTokenData;
use Sawirricardo\IcdApi\Requests\CreateAccessTokenRequest;

class IcdApi
{
    private ?AccessTokenData $accessTokenData;

    public function __construct(
        private string $clientId,
        private string $clientSecret
    ) {
        $this->accessTokenData = (new AccessTokenConnector(
            $this->clientId,
            $this->clientSecret
        ))
        ->send(new CreateAccessTokenRequest())
        ->throw()
        ->dto();
    }

    public function getAccessTokenData(): AccessTokenData
    {
        return $this->accessTokenData;
    }

    public function icd(): IcdConnector
    {
        return new IcdConnector($this->accessTokenData->accessToken);
    }
}
