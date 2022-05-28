<?php

use Sawirricardo\IcdApi\Connectors\AccessTokenConnector;
use Sawirricardo\IcdApi\Connectors\IcdConnector;
use Sawirricardo\IcdApi\Data\AccessTokenData;
use Sawirricardo\IcdApi\Requests\CreateAccessTokenRequest;

it('can list entities', function () {
    /** @var AccessTokenData */
    $accessTokenData = (new AccessTokenConnector(
        'client_id',
        'client_secret',
    ))
        ->send(new CreateAccessTokenRequest())
        ->throw()
        ->dto();

    /** @var \Sawirricardo\IcdApi\Data\EntityCollectionData */
    $entities = (new IcdConnector($accessTokenData->accessToken))
        ->entities()
        ->all();
    expect($entities)->not->toBeNull();
    expect($entities->availableLanguages)->toBeArray();
    expect($entities->availableLanguages)->toHaveCount(5);
    expect($entities->child)->toBeArray();
    expect($entities->child)->toHaveCount(1);
});
