<?php

use Sawirricardo\IcdApi\Connectors\AccessTokenConnector;
use Sawirricardo\IcdApi\Data\AccessTokenData;
use Sawirricardo\IcdApi\Requests\CreateAccessTokenRequest;

it('can create access token', function () {
    /** @var AccessTokenData */
    $accessTokenData = (new AccessTokenConnector(
        'client_id',
        'client_secret',
    ))
        ->send(new CreateAccessTokenRequest())
        ->throw()
        ->dto();

    expect($accessTokenData)->not->toBeNull();
    expect($accessTokenData->accessToken)->toBeString();
    expect($accessTokenData->tokenType)->toBeString()->toBe('Bearer');
    expect($accessTokenData->expiresIn)->toBeInt()->toBe(3600);
});
