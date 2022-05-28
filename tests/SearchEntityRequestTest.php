<?php

use Sawirricardo\IcdApi\Connectors\AccessTokenConnector;
use Sawirricardo\IcdApi\Connectors\IcdConnector;
use Sawirricardo\IcdApi\Data\AccessTokenData;
use Sawirricardo\IcdApi\Requests\CreateAccessTokenRequest;
use Sawirricardo\IcdApi\Requests\SearchEntityRequest;

it('can search by word', function () {
    /** @var AccessTokenData */
    $accessTokenData = (new AccessTokenConnector(
        'client_id',
        'client_secret',
    ))
        ->send(new CreateAccessTokenRequest())
        ->throw()
        ->dto();
    $request = new SearchEntityRequest();
    $request->mergeQuery(['q' => 'BBIBP-CorV%']);
    (new IcdConnector($accessTokenData->accessToken))
        ->send($request)
        ->throw()
        ->collect();
});
