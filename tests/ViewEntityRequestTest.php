<?php

use Sawirricardo\IcdApi\Connectors\AccessTokenConnector;
use Sawirricardo\IcdApi\Connectors\IcdConnector;
use Sawirricardo\IcdApi\Data\AccessTokenData;
use Sawirricardo\IcdApi\Requests\CreateAccessTokenRequest;
use Sawirricardo\IcdApi\Requests\ViewEntityRequest;

it('can view an entity', function () {
    /** @var AccessTokenData */
    $accessTokenData = (new AccessTokenConnector(
        'client_id',
        'client_secret',
    ))
        ->send(new CreateAccessTokenRequest())
        ->throw()
        ->dto();

    $entityId = '1435254666';
    $entity = (new IcdConnector($accessTokenData?->accessToken))
        ->send(new ViewEntityRequest($entityId))
        ->throw()
        ->dto();

    expect($entity)->not->toBeNull();
});
